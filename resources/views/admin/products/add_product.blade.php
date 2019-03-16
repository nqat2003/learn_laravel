@extends('layouts.admin')

@section('title','Add New Product')

@section('content')
<h1>Add New Product</h1>
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form action="{{Route('do_add_product')}}" method="POST" class="form-add"  enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="">Name: </label>
		<input type="text" class="form-control"  name="name">
	</div>
	<div class="form-group">
		<label for="">Price:</label>
		<input type="number" class="form-control"  name="price">
	</div>
	<div class="form-group">
		<label for="exampleInputFile">File input</label>
		<input type="file" id="exampleInputFile" name="file">
	</div>
	<!-- <div class="form-group">
		<label for="">Description:</label>
		<input type="text" class="form-control"  name="des">
	</div> -->
	<div class="form-group">
		<label for="">Description:</label>
		<textarea name="des" id="editor"></textarea>
	</div>
	
	<div class="text-center">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
	
</form>
@endsection