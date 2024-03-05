<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('user', [App\Http\Controllers\UserController::class,'index'])->name('user');
Route::get('user-list', [App\Http\Controllers\UserController::class,'UserList'])->name('user-list');
Route::post('user-create', [App\Http\Controllers\UserController::class,'createUser'])->name('user-create');
Route::get('user-table', [App\Http\Controllers\UserController::class,'dataTable'])->name('user.datatable');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
