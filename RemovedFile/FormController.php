<?php

namespace App\Http\Controllers;
use App\User;
use Session;
use DB;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function registerAdd(Request $request){

    	if ($request->isMethod('post')) {
	    	$data = $request->except('_token');
         	     $userData = User::create([
	    	 	"name"=>$data['name'],
	    	 	"email"=>$data['email'],
	    		"password"=>$data['password'],
	    		"gender"=>$data['gender']
	    	]);
    	     if ($userData) {
	    		Session::flash('success','Added successfully');
	    	}else{
	    		 Session::flash('error', 'something went wrong.');
	    		die();
	    	}

    }
      return view('demo');
    }
 
    public function FormAdd(Request $request){

    	if($request->isMethod('post')){
    	$data = $request->except('_token');
        if($image = $request->Image){
        $image = $request->Image;
        $input['Image'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['Image']);
    	$data['Image'] = $input['Image'];
        }     
        DB::table('profile')->insert($data);		
        return back()->with('success','Image Upload successful');
    }
      return view('demo');        

    }
}
    //     public function FormAdd(Request $request)
    // {
    //     if($request->isMethod('post')){
    //     $data = $request->except('_token');
    //     if($request->image){
	   //  $image = $request->image;
    //     $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
    //     $destinationPath = public_path('/images');
    //     $image->move($destinationPath, $input['imagename']);
    //     $this->postImage->add($input);
	   //  dd($image);
    //     }
    //     DB::table('profile')->insert($data);
    // }
    // return view('demo'); 
    // }
