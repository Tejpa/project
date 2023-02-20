@extends('admin.layout')
@section('content')
	<form action="{{ route('product.update',$product->id) }}" method="post" style="background-color:#dcdae06e;" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<h2>Edit Product</h2>
		<div class="row">
			<div class="col-sm-4">
				<div class="mb-3">
				    <label for="title" class="form-label">Title</label>
				    <input type="text" class="form-control" name="title" id="title" value="{{$product->title}}" placeholder="title">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="mb-3">
				    <label for="author" class="form-label">Author</label>
				    <input type="text" class="form-control" name="author" id="author"  value="{{$product->author}}" placeholder="author">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="mb-3">
				    <label for="genre" class="form-label">Genre</label>
				    <input type="text" class="form-control" name="genre" id="genre"  value="{{$product->genre}}" placeholder="genre">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<div class="mb-3">
				   <label for="description" class="form-label">Description</label>
				    <textarea class="form-control" id="description" name="description" rows="3" placeholder="write description...">{{$product->description}}</textarea>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="mb-3">
				  <label for="image" class="form-label">Upload Image</label>
				  <input class="form-control" type="file" name="image" id="image">
				</div>
				<?php $data = strpos("{{$product->image}}","h");
				 ?>
				@if(empty($data))
				<img src="{{ url('images/'.$product->image) }}" height="100px;">
				@else 
				<img src="{{$product->image}}" height="100px;">
				@endif
			</div>
		</div>
        <div class="row">
			<div class="col-sm-4">
				<div class="mb-3">
				    <label for="isbn" class="form-label">ISBN</label>
				    <input type="number" class="form-control" name="isbn" id="isbn" value="{{$product->isbn}}" placeholder="isbn">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="mb-3">
				    <label for="published" class="form-label">Published</label>
				    <input type="date" class="form-control" name="published" id="published" value="{{$product->published}}" placeholder="published">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="mb-3">
				    <label for="publisher" class="form-label">Publisher</label>
				    <input type="text" class="form-control" name="publisher" id="publisher" value="{{$product->publisher}}" placeholder="publisher name">
				</div>
			</div>
		</div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{ url('product') }}" type="button" class="btn btn-primary">Back</a>
</form>
</div> 
</div>
@endsection