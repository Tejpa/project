@extends('admin.layout')
@section('content')   
        @if(session()->has('success'))
        <div class="alert alert-success">
             {{ session()->get('success') }}
        </div>

        @endif
   	  	<h2>Product List</h2>
        <div class="text-right">
        <a href="{{ url('product/create') }}" type="button" class="btn btn-primary">Add Product</a>
        <a type="button" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
           @csrf
        </form>
    </div>
   	  	<div class="col-sm">
   	  		<table id="product-list" class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>ISBN</th>
                <th>Image</th>
                <th>published</th>
                <th>publisher</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($product as $proVal)
            <tr>
                <td>{{$proVal->id}}</td>
                <td>{{$proVal->title}}</td>
                <td>{{$proVal->author}}</td>
                <td>{{$proVal->genre}}</td>
                <td>{{$proVal->isbn}}</td>
                <td>
                    <?php $data = strpos("{{$proVal->image}}","h");
                     ?>
                    @if(empty($data))
                    <img src="{{ url('images/'.$proVal->image) }}" height="100px;">
                    @else 
                    <img src="{{$proVal->image}}" height="100px;">
                    @endif

                </td>
                <td>{{$proVal->published}}</td>
                <td>{{$proVal->publisher}}</td>
                <td><a href="{{ route('product.edit',$proVal->id) }}" class="btn btn-primary">Edit</a>
                <form method="post" action="{{route('product.destroy',$proVal->id)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form> 
            </td>
                
            </tr>
            @endforeach
        </tbody>
        </table>
   	  	</div>
   	 @endsection