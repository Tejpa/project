@extends('frontend.master')
@section('content')
   <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal">Book Store</h1>
      <p class="fs-5 text-muted">Get latest book here</p>
      <form class="d-flex" action="{{ route('index.search') }}" method="GET">
          <input class="form-control me-2" type="search" name="book_search" placeholder="Search book" aria-label="Search">
          <button class="btn btn-primary" type="submit">Search</button>
      </form>
   </div>

<div class="container">
   <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($product as $pro)
    <a href="{{ url('single-product',$pro->id) }}" style="text-decoration: none;">
      <div class="col">
         <div class="card shadow-sm">
          <img src="{{$pro->image}}" class="" alt="image" style="height:250px;">
            
            <div class="card-body">
               <p class="card-text">{{$pro->title}}</p>
               <div class="d-flex justify-content-between align-items-center">
               </div>
            </div>
          
         </div>
      </div>
      </a>
      @endforeach
    </div>
   <span class="mb-4 mt-5"> {{ $product->links() }}</span>
   
</div>
</div>
@endsection
   