<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use App\Models\UserDetail;
use App\Models\EducationalDetail;
use DataTables;
use App\Exports\ExportUser;
use Excel;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function ajaxList()
    {
        return view('user.ajaxtable');
    }
    
    public function ajaxTable()
    {
        $user = User::with('userDetail', 'educationalDetail')->get();
        return Datatables::of($user)
        ->addColumn('phone', function ($row) {
            return isset($row->userDetail->phone) ? $row->userDetail->phone : '';
        })
        ->addColumn('address', function ($row) {
            return isset($row->userDetail->address) ? $row->userDetail->address : '';
        })
        ->addColumn('city', function ($row) {
            return isset($row->userDetail->city) ? $row->userDetail->city : '';
        })
        ->addColumn('pincode', function ($row) {
            return isset($row->userDetail->pincode) ? $row->userDetail->pincode : '';
        })
        ->addColumn('state', function ($row) {
            return isset($row->userDetail->state) ? $row->userDetail->state : '';
        })
        ->addColumn('country', function ($row) {
            return isset($row->userDetail->country) ? $row->userDetail->country : '';
        })
        ->addColumn('program', function ($row) {
            return isset($row->educationalDetail->program) ? $row->educationalDetail->program : '';
        })
        ->addColumn('batch', function ($row) {
            return isset($row->educationalDetail->batch) ? $row->educationalDetail->batch : '';
        })
        ->addColumn('passing_year', function ($row) {
            return isset($row->educationalDetail->passing_year) ? $row->educationalDetail->passing_year : '';
        })
        ->addColumn('university', function ($row) {
            return isset($row->educationalDetail->university) ? $row->educationalDetail->university : '';
        })
        ->rawColumns(['phone','address','city','pincode','state','country','program','batch','passing_year','university'])
        ->make(true);
    }
    
    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }
    public function exportCsvUsers(Request $request){
        return Excel::download(new ExportUser, 'users.csv');
    }
    public function exportPdfUsers(Request $request){
     
        $pdf = Pdf::loadView('user.pdf');
     
        return $pdf->download();
    }
}
