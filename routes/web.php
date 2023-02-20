<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/postproduct',[ProductController::class, 'postAllProduct']);
//This route goes to CRUD
//Route::get('dashboard',[ProductController::class, 'index'])->name('dashboard');
Route::resource('product', ProductController::class);

Route::get('/',[FrontendController::class, 'index'])->name('index.search');
Route::get('/single-product/{id}',[FrontendController::class, 'singleProduct']);


Auth::routes();
  //dd(Auth::user());die;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','isAdmin'])->group( function(){
  //dd(Auth::check());
  //Route::resource('product', ProductController::class);
});
