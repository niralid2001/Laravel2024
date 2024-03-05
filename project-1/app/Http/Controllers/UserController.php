<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use App\Models\UserDetail;
use App\Models\EducationalDetail;

use App\DataTables\UsersDataTable;

class UserController extends Controller
{
    public  function index() 
    {
       return view('user.form'); 
    }

    public function createUser(Request $request) 
    {
        // print_r($request->all());
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email']
        ]);

        $user_id =  $user->id;
        $detail = UserDetail::create([
            'user_id'=>$user_id,
            'phone'=>$request['phone'],
            'address'=>$request['address'],
            'city'=>$request['city'],
            'pincode'=>$request['pincode'],
            'state'=>$request['state'],
            'country'=>$request['country'],
        ]);

        $educational = EducationalDetail::create([
            'user_id'=>$user_id,
            'program'=>$request['program'],
            'batch'=>$request['batch'],
            'passing_year'=>$request['passing_year'],
            'university'=>$request['university'],
        ]);

        if($user &&  $detail  && $educational){
            return redirect() -> route("user-list") -> withSuccess('User Created Successfully!');
        }else{
            return back()->withError('Error Creating User!');
        }
    }

    public function userList(Request $request) 
    {
        $search = $request->search;
        $user = User::with('userDetail','educationalDetail')->where('name', 'like', '%' . $search . '%')->paginate(2);
        return view('user.list',compact('user'));
        print_r($search);exit;
    }

    public function dataTable(UsersDataTable $dataTable)
    {
        return $dataTable->render('user.datatable');
    }
    
}
