<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function() {
    $products = Product::get();

    return view('products.product')->with('products', $products);
});

Route::get('/recherche', 'ProductController@search')->name('products.search');

Route::get('/shop', function() {
    $products = Product::get();
    $products = Product::with('cat')->paginate(10);


    return view('products.index')->with('products', $products);
});

Route::get('/boutique/{moreinfo}','ProductController@show')->name('products.show');


Route::post('/panier/ajouter','CartController@store' )->name('cart.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
