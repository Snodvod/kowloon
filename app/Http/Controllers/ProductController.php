<?php

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);

        $faq = $product->faqs;
        $related = Category::find($product->category->id)->products()->take(4)->get();

        return view('products.detail', ['product' => $product, 'related' => $related, 'faqs' => $faq]);
    }
}
