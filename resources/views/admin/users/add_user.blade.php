@extends('layouts.admin')

@section('title','Add New User')

@section('content')
<h1>Add user</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{Route('add_user')}}" method="POST" class="form-add">
	@csrf
	<div class="form-group">
		<label for="">Name: </label>
		<input type="text" class="form-control" id="formGroupExampleInput" name="name">
		
	</div>
	<div class="form-group">
		<label for="">Email:</label>
		<input type="email" class="form-control" id="formGroupExampleInput2" name="email">
	</div>
	<div class="form-group">
		<label for="">Password:</label>
		<input type="password" class="form-control" id="formGroupExampleInput2" name="pass">

	</div>
	<div class="form-group">
		<label for="">Re-Password:</label>
		<input type="password" class="form-control" id="formGroupExampleInput2" name="pass2">
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
	
</form>
@endsection