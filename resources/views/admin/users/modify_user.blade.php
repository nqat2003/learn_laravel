@extends('layouts.admin')

@section('title','Modify User')

@section('content')
<h1>Modify User</h1>
<form action="{{Route('do_modify_user')}}" method="POST" class="form-add">
	@csrf
	@foreach ($user as $key => $data_user)
	<input type="hidden" name="id" value="{{$data_user->id}}">
	<div class="form-group">
		<label for="">Name: </label>
		<input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{$data_user->name}}">
	</div>
	<div class="form-group">
		<label for="">Email:</label>
		<input type="email" class="form-control" id="formGroupExampleInput2" name="email" value="{{$data_user->email}}">
	</div>
	@endforeach
	<div class="text-center">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
	
</form>
@endsection