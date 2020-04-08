@extends('layouts.app')


@section('content')

	<hr>	
		<h1 class="text-center">Roles</h1>	
	<hr>   	   
	<form action ="{{ route('roles.store') }}" method="POST">
		{{ csrf_field() }}
		
		<div class="form-group col-lg-6">
			<label for="name">Name</label>
			<input type="text" name="name" class="form-control">
		</div>
		
		<div class="form-group col-lg-6">
			<label for="salary">Salary</label>
			<input type="number" name="salary" class="form-control">
		</div>
		
		<div class="form-group col-lg-12">
			<label for="department">Select a department</label>
			<select name="department_id"  cols="5" rows="5" class="form-control">
				@foreach($departments as $department)
					<option value="{{ $department->id}}">{{ $department->name }}</option>
				@endforeach
			</select>
		</div>
		
		<div class="form-group">
			<div class="text-center">
				<button class ="btn.btn.success" type="submit">Create</button>
			</div>
		</div>
	</form>	
@endsection




Route::get('/','PostController@index');
Route::get('/user/list','PostController@index');
Route::match(['get','post'],'/user/add','PostController@add');
Route::match(['get','post'],'/user/edit/{userId}','PostController@update');
Route::match(['get','post'],'registration','FormController@registerAdd');

 Route::match(['get','post'],'dependency','DepartmentController@dependency');
 Route::match(['get','post'],'dependency/listing','DepartmentController@listing');
 Route::match(['get','post'],'dependency/edit/{id}','DepartmentController@edit');
 Route::match(['get','post'],'dependency/delete/{id}','DepartmentController@delete1');
// Route::match(['get','post'],'state/list','DepartmentController@statelist');
// Route::match(['get','post'],'city/list','DepartmentController@citylist');

// Route::match(['get','post'],'dropdownlist','DepartmentController@index');
// Route::match(['get','post'],'get-state-list','DepartmentController@getStateList');
// Route::match(['get','post'],'get-city-list','DepartmentController@getCityList');

// define('AdminProfileBasePath','public\images');
// define('UserProfileBasePath','public\images');
Route::match(['get','post'],'add/form','FormController@FormAdd');