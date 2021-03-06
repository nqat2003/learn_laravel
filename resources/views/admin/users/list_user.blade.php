@extends('layouts.admin')
@section('title','List Users')
@section('content')
<h1>List Users</h1>
<div class="row">
        <div class="col-md-4 col-md-offset-3 pull-right">
            <form action="{{Route('user_search')}}" class="search-form" method="POST">
            	@csrf
                <div class="form-group has-feedback">
            		<label for="search" class="sr-only">Search</label>
            		<input type="text" class="form-control" name="search_key" id="search" placeholder="Press Enter to search" style="border-radius: 5px;" autocomplete="off">
              		<span class="glyphicon glyphicon-search form-control-feedback"></span>
            	</div>
            </form>
        </div>
    </div>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
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
				$i = 1;
			@endphp
			@foreach ($users as $key => $user)
			<tr>
				@php
					if (isset($_GET['page'])){
						$a = $_GET['page'];
					}
					else $a = 1;
				@endphp
				<td>
					{{ $i + $a * 10 - 10 }}					
				</td>
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
		<div class="d-flex justify-content-center" style="display: flex;justify-content:center;"> {{ $users->links() }}</div>
	</div>

	<!-- /.box-body -->
</div>

@endsection