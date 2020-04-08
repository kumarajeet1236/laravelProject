<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/assets/toaster.min.css')}}">
	<script type="text/javascript" src="{{asset('public/assets/jquery.min.js')}}"></script>
</head>
<body>
	<form action="" class="form-control" method="post" autocomplete="on">
		@csrf
	 	<div class="form-group">
	    	<label for="exampleInputEmail1">Name</label>
	    	<input type="text" autocomplete="off" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Name" value="{{isset($userData['name'])?$userData['name']:''}}">
	  	</div>
	  	<div class="form-group">
	    	<label for="exampleInputEmail1">Email address</label>
	    	<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{isset($userData['email'])?$userData['email']:''}}">
	  	</div>
		<div class="form-group">
		   	 <label for="exampleInputPassword1">Password</label>
		   	 <input type="password" autocomplete="off" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" value="">
		</div>
		<div class="form-group">
		   	 <label for="exampleInputPassword2">Confirm Password</label>
		   	 <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword2" placeholder="confirm Password" value="">
		</div>
		<div class="form-group">
		   	 <label for="exampleInputMobile">Mobile</label>
		   	 <input type="text" class="form-control" name="mobile" id="exampleInputMobile" value="{{isset($userData['mobile'])?$userData['mobile']:''}}" placeholder="Enter Mobile No.">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<div class="row">
	</div>
</body>
<script type="text/javascript" src="{{asset('public/assets/toaster.min.js')}}"></script>
</html>