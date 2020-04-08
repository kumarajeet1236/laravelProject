<?php

namespace App\Http\Controllers\student;
use Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function registration(Request $request)
    { 
        return view('login');

    }

    public function view(Request $request)
    { 
    	mail::send(['text'=>'Admin.view'],['name','Murari'],function($message){
    	    $message123 = 'murarikumar699@gmail.com';
    		$message->to($message123,'To Murari')->subject('Text Email');
    		$message->from('murarikumarthakur5000@gmail.com','From Murari');
    	});
        return view('Admin.view');

    }
}
