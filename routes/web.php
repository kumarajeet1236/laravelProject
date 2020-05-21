<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/', function () {
     return view('Admin/view');
 });
 Route::match(['get','post'],'registration','Student\StudentController@registration');
Route::get('admin', function () {
     return view('Admin/login');
 });
Route::get('registration', function () {
     return view('Student/registration');
 });
   
Route::match(['get','post'],'view','Student\StudentController@view');
