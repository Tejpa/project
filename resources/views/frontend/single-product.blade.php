@extends('frontend.master')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-lg-6">
        <div class="img-big-wrap img-thumbnail"> 
            <img height="520" width="100%" src="{{$singleProduct->image}}"> 
        </div>
      </div>
      <div class="col-lg-6">
         <article class="ps-lg-3">
            <h4 class="title text-dark">{{$singleProduct->title}}</h4>
            <p>{{$singleProduct->description}}</p>
            <dl class="row">
               <dt class="col-3">Author</dt>
               <dd class="col-9">{{$singleProduct->author}}</dd>
               <dt class="col-3">Genre</dt>
               <dd class="col-9">{{$singleProduct->genre}}</dd>
               <dt class="col-3">ISBN</dt>
               <dd class="col-9">{{$singleProduct->isbn}}</dd>
               <dt class="col-3">Published</dt>
               <dd class="col-9">{{$singleProduct->published}}</dd>
               <dt class="col-3">Publisher</dt>
               <dd class="col-9">{{$singleProduct->publisher}}</dd>
            </dl>
            <hr>
            <a href="#" class="btn btn-warning"> Buy now </a> 
            <a href="#" class="btn btn-primary"> <i class="me-2 fa fa-shopping-basket"></i> Add to cart </a>  
         </article>
        
      </div>
   </div>
</div>
@endsection