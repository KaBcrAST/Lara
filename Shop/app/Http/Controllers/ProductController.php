<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    public function index(){
        return view('products.index');

        $products = Product::whith('categories')->paginate(10);
    }
  
    public function show($moreinfo)
    {
        $product = Product::where('moreinfo',$moreinfo)->first();
        return view('products.show')->with('product', $product);
    }

    public function search(){
        $quest = request()->input('quest');

        $products = Product::where('cat','like', "%$quest%")
        ->orWHere('description','like',"%$quest%")
        ->orWHere('title','like',"%$quest%")
        ->orWHere('acteurs','like',"%$quest%")
        ->orWHere('realisateur','like',"%$quest%")
        ->orWHere('id','like',"%$quest%")

        ->paginate(10);

    return view('products.search')->with('products', $products);
    }

}
