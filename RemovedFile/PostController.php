<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Validator;

class PostController extends Controller
{
    public function index(){

    	$userData = User::get()->toArray();
		// echo "<pre>";
		// print_r($userData);
		// die();

    	
    	return view('userListing',compact('userData'));

    }

    public function add(Request $request){
    	
    	if ($request->isMethod('post')) {
	    	$data = $request->except('_token');
	    	// echo "<pre>";
	    	// print_r($data);
	    	// die();

	    	// Method 1 to insert 

	    	// $userData = User::create([
	    	// 	"name"=>$data['name'],
	    	// 	"email"=>$data['email'],
	    	// 	"password"=>$data['password'],
	    	// 	"mobile"=>$data['mobile']
	    	// ]);

	    	// if ($userData) {
	    	// 	echo "<pre>";
	    	// 	print_r($userData);
	    	// 	die();
	    	// }else{
	    	// 	echo "something went wrong.";
	    	// 	die();
	    	// }

	    	// Method 2 to insert 
	    	//new user is object method

	    	$userData = new User;
	    	$userData->name 	= $data['name'];
	    	$userData->email 	= $data['email'];
	    	$userData->password = Hash::make($data['password']);
	    	$userData->mobile 	= $data['mobile'];
	    	if ($userData->save()) {
	    		// echo "<pre>";
	    		// print_r($userData);
	    		// die;
	    		// return redirect()->to('user/list');
	    		return redirect('user/list');
	    	}else{
	    		echo "something went wrong.";
	    		return redirect()->back();
	    		// die;
	    	}

	    	//method 3
	    	// $userData = DB::table('users')->insert([
	    	// 	"name"=>$data['name'],
	    	// 	"email"=>$data['email'],
	    	// 	"password"=>$data['password'],
	    	// 	"mobile"=>$data['mobile'],
	    	// 	"created_at"=>date('Y-m-d H:m:s'),
	    	// 	"updated_at"=>date('Y-m-d H:m:s')
	    	// ]);

	    	// if ($userData) {
	    	// 	echo "<pre>";
	    	// 	print_r($userData);
	    	// 	die();
	    	// }else{
	    	// 	echo "something went wrong.";
	    	// 	die();
	    	// }
    	}

    	return view('userRegistration');
    }

    public function update(Request $request,$user_id){
    	$userData = User::where('id',$user_id)->first();
    	if ($request->isMethod('post')) {

	    	$data = $request->except('_token');

	    	$validator = Validator::make($data,[
	    		'name' => 'required',
		        'mobile' => 'required',
		        'email' => 'required',
		        'password' => 'confirmed'
	    	]);

		    if ($validator->fails()) {
	            // return redirect()->back();
	        	echo "Please fill all the required fields.";
	        	die();
	        }

	    	// echo "<pre>";
	    	// print_r($data);
	    	// die();

	    	// Method 1 to insert 

	    	// $userData = User::create([
	    	// 	"name"=>$data['name'],
	    	// 	"email"=>$data['email'],
	    	// 	"password"=>$data['password'],
	    	// 	"mobile"=>$data['mobile']
	    	// ]);

	    	// if ($userData) {
	    	// 	echo "<pre>";
	    	// 	print_r($userData);
	    	// 	die();
	    	// }else{
	    	// 	echo "something went wrong.";
	    	// 	die();
	    	// }

	    	// Method 2 to insert 

	    	$userData = User::find($user_id);
	    	$userData->name 	= $data['name'];
	    	// $userData->email 	= $data['email'];
	    	if (!empty($data['password'])) {
	    		$userData->password = $data['password'];
	    	}
	    	$userData->mobile 	= $data['mobile'];
	    	if ($userData->save()) {
	    		// echo "<pre>";
	    		// print_r($userData);
	    		// die;
	    		// return redirect()->to('user/list');
	    		return redirect('user/list');
	    	}else{
	    		echo "something went wrong.";
	    		die;
	    	}

	    	//method 3
	    	// $userData = DB::table('users')->insert([
	    	// 	"name"=>$data['name'],
	    	// 	"email"=>$data['email'],
	    	// 	"password"=>$data['password'],
	    	// 	"mobile"=>$data['mobile'],
	    	// 	"created_at"=>date('Y-m-d H:m:s'),
	    	// 	"updated_at"=>date('Y-m-d H:m:s')
	    	// ]);

	    	// if ($userData) {
	    	// 	echo "<pre>";
	    	// 	print_r($userData);
	    	// 	die();
	    	// }else{
	    	// 	echo "something went wrong.";
	    	// 	die();
	    	// }
    	}

    	return view('userRegistration',compact('userData'));
    }

}
