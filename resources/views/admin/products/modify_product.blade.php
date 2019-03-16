@extends('layouts.admin')

@section('title','Modify Product')

@section('content')
<h1>Modify Product</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{Route('do_modify_product')}}" method="POST" class="form-add" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="id" value="{{$product->id}}">
	<div class="form-group">
		<label for="">Name: </label>
		<input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{$product->name}}">
	</div>
	<div class="form-group">
		<label for="">Price:</label>
		<input type="number" class="form-control" id="formGroupExampleInput2" name="price" value="{{$product->price}}">
	</div>
	<div class="form-group">
		<label>Current Image: </label>
		<img style="max-width: 100px; max-height: 100px;" src="{{asset('backend/img/'.$product->image)}}">
	</div>
	<div class="form-group">
		<label for="exampleInputFile">New Image: (do nothing if not change)</label>
		<input type="file" id="exampleInputFile" name="file">
	</div>
	<div class="form-group">
		<label for="">Description:</label>
		<textarea name="des" id="editor">{{$product->description}}</textarea>
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>
@endsection