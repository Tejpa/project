<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    /*
    * Product list data with search functionality
    */
    public function index(Request $request)
    {
        
        if(!empty($request->input('book_search')))
        {
            $serachVal = $request->input('book_search');
            $product = Product::where('title','LIKE', '%'.$serachVal.'%')
             ->orWhere('author','LIKE', '%'.$serachVal.'%')
             ->orWhere('isbn','LIKE', '%'.$serachVal.'%')
             ->orWhere('genre','LIKE', '%'.$serachVal.'%')
             ->orWhere('published','LIKE', '%'.$serachVal.'%')
             ->paginate(10);
        } else {
            $product = Product::paginate(10);
        }
        
        return view('frontend.index',compact('product'));
    }
    /*
    * Single Product by id
    */
    public function singleProduct(Request $request, $id)
    {
        $singleProduct = Product::where('id',$id)->first();
        return view('frontend.single-product',compact('singleProduct'));
    }
}
