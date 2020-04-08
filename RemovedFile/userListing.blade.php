<!DOCTYPE html>
<html>
<head>
	<title>User Listing</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/assets/toaster.min.css')}}">
	<script type="text/javascript" src="{{asset('public/assets/jquery.min.js')}}"></script>
</head>
<body>
	<div class="form-group float-right">
		<a href="{{url('user/add')}}"><button class="btn btn-primary">Add User</button></a>
	</div>
	<table class="table">
	  	<thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Mobile</th>
		      <th scope="col">Action</th>
		    </tr>
	  	</thead>
	  	
	  	<tbody>
	  		@if(!empty($userData))
	  			@foreach($userData as $key => $value)
	  			<?php dd($value); ?>
				    <tr>
				      <th scope="row">{{$key+1}}</th>
				      <td>{{ucfirst($value['name'])}}</td>
				      <td>{{$value['email']}}</td>
				      <td>{{$value['mobile']}}</td>
				      <td>
				      	<a href="{{url('dependency/edit/'.$value['id'])}}"><button class="btn btn-primary">Edit</button></a>
				      	<a href="{{url('dependency/delete1/'.$value['id']}}"><button class="btn btn-danger">Delete</button></a>
				      </td>
				    </tr>
	  			@endforeach
	  		@else
	  			<tr>
			      	<td colspan="6">No Record Found.</td>
			    </tr>
	  		@endif
	  	</tbody>
	</table>
</body>
<script type="text/javascript" src="{{asset('public/assets/toaster.min.js')}}"></script>
<script type="text/javascript">
	$(document).load(function() {
		toastr.success('Success','Success Title');
	})
</script>
</html>