<?php

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {

    }
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.detail', ['product' => $product]);
    }
}
