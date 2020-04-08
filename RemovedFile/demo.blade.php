<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<form action="" class="form-control" method="post" autocomplete="on" enctype = 'multipart/form-data'>
		@csrf
	 	<div class="form-group">
	    	<label for="name">Name</label>
	    	<input type="text" autocomplete="off" class="form-control" name="first_name" id="name" placeholder="Enter Name" value="{{isset($userData['name'])?$userData['name']:''}}">
	  	</div>
	  	<div class="form-group">
	    	<label for="Email">Email address</label>
	    	<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{isset($userData['email'])?$userData['email']:''}}">
	  	</div>
		<div class="form-group">
		   	 <label for="Password">Password</label>
		   	 <input type="password" autocomplete="off" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" value="">
		</div>
		<div class="form-group">
		   	 <label for="imahe">Image</label>
		   	 <input type="file"  class="form-control" name="Image">
		</div>
		<div class="form-group">
		   	<label for="gender">gender</label>
		   	Male:<input type="radio" class="form-control" name="gender" id="male" value="male">
		   	Female:<input type="radio" class="form-control" name="gender" id="female" value="female">
		</div>
		<div class="form-group">
		   	 <label for="Mobile">Mobile</label>
		   	 <input type="text" class="form-control" name="mobile_number" id="exampleInputMobile" value="{{isset($userData['mobile'])?$userData['mobile']:''}}" placeholder="Enter Mobile No.">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<div class="row">
	</div>
</body>
<script type="text/javascript" src="{{asset('public/assets/toaster.min.js')}}"></script>
</html>