<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;



class ProductController extends Controller
{

    
    /*
    * post data
    */
    public function postAllProduct()
    {
       $response = Http::get('https://fakerapi.it/api/v1/books?_quantity=100');
        $data = $response->json();
        
        foreach($data['data'] as $val) {
            $product = new Product();
            $product->id = $val['id'];
            $product->title = $val['title'];
            $product->author = $val['author'];
            $product->genre = $val['genre'];
            $product->description = $val['description'];
            $product->isbn = $val['isbn'];
            $product->image = $val['image'];
            $product->published = $val['published'];
            $product->publisher = $val['publisher'];
            $product->save();
        }
        echo "sucess";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = Product::all();
        return view('admin.product.index',compact('product')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $product = new Product();
        $product->title = $request->title;
        $product->author = $request->author;
        $product->genre = $request->genre;
        $product->description = $request->description;
        $product->isbn = $request->isbn;
        $product->image = $imageName;
        $product->published = $request->published;
        $product->publisher = $request->publisher;
        $product->save();
        return redirect('product')->with('success','Product added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if(!empty($product)){
        if(!empty($request->image)){
          $imageName = time().'.'.$request->image->extension();  
          $request->image->move(public_path('images'), $imageName);
          $product->title = $request->title;
            $product->author = $request->author;
            $product->genre = $request->genre;
            $product->description = $request->description;
            $product->isbn = $request->isbn;
            $product->image = $imageName;
            $product->published = $request->published;
            $product->publisher = $request->publisher;
        } else {
            $product->title = $request->title;
            $product->author = $request->author;
            $product->genre = $request->genre;
            $product->description = $request->description;
            $product->isbn = $request->isbn;
            $product->published = $request->published;
            $product->publisher = $request->publisher;
        }
        $product->save();
        return redirect('product')->with('success','Product Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('product')->with('success','Product is deleted');
    }
}
