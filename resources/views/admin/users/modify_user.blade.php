@extends('layouts.admin')

@section('title','Modify User')

@section('content')
<h1>Modify User</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
	<div class="form-group">
		<label for="">New password:</label>
		<input type="password" class="form-control" id="formGroupExampleInput2" name="pass" placeholder="Let blank if not change">
	</div>
	@endforeach
	<div class="text-center">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
	
</form>
@endsection