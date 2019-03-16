@extends('layouts.admin')
@section('title','List Products')
@section('content')
<h1>List Products</h1>
<div class="row">
        <div class="col-md-4 col-md-offset-3 pull-right">
            <form action="{{Route('product_search')}}" class="search-form" method="POST">
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
				<th style="width: 100px">Image</th>
				<th>Name</th>
				<th>Price</th>
				<th>Description</th>
				<th style="width: 120px">Action</th>
			</tr>
			@php 
				$i = 1
			@endphp
			@foreach ($products as $key => $product)
			<tr>
				<td>{{$i}}</td>
				@php 
					$i++ 
				@endphp
				<td><img src="{{asset('backend/img/'.$product->image)}}" style="width: 50px;height: 50px;"></td>
				<td>{{$product->name}}</td>
				<td>{{$product->price}}</td>
				<td>{{$product->description}}</td>
				<td>
					<a href="{{Route('modify_product',['id' => $product->id])}}" class="badge bg-green">Modify</a>
					<a href="{{Route('delete_product',['id' => $product->id])}}" class="badge bg-red">Delete</a>
				</td>
			</tr>
			@endforeach

		</table>
	</div>
	<!-- /.box-body -->
</div>
@endsection