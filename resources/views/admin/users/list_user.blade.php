@extends('layouts.admin')
@section('title','List Users')
@section('content')
<h1>List Users</h1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="box">
	<div class="box-body no-padding">
		<table class="table">
			<tr>
				<th style="width: 10px">Id</th>
				<th>Name</th>
				<th>Email</th>
				<th style="width: 120px">Action</th>
			</tr>
			@php 
				$i = 1
			@endphp
			@foreach ($users as $key => $user)
			<tr>
				<td>{{$i}}</td>
				@php 
					$i++ 
				@endphp
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>
					<a href="{{Route('modify_user',['id' => $user->id])}}" class="badge bg-green">Modify</a>
					<a href="{{Route('delete_user',['id' => $user->id])}}" class="badge bg-red">Delete</a>
				</td>
			</tr>
			@endforeach

		</table>
	</div>
	<!-- /.box-body -->
</div>
@endsection