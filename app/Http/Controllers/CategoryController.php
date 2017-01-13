<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->segment(2);
        $category = Category::find($id);
        $tags = Tag::all();
        $products = $category->products;

        foreach($products as $product)
        {
            $product->image = $product->images()->first()->image;
        }

        return view('categories.index', ['category' => $category, 'tags' => $tags, 'products' => $products]);
    }

    public function filter($id, Request $request)
    {
        $category = Category::find($id);
        $tags = Tag::all();

        $senttags = $request->tags;
        if(!$senttags) {
            $senttags = [1,2,3,4,5];
        }

        $products =  DB::table('products')
            ->select('products.*', 'images.image')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('images', 'images.product_id', '=', 'products.id')
            ->join('product_tag', 'product_tag.product_id', 'products.id')
            ->join('tags', 'product_tag.tag_id', 'tags.id')
            ->where('categories.id', $id)
            ->whereBetween('price', [$request->min, $request->max])
            ->whereIn('tags.id', $senttags)
            ->get();


        return view('categories.index', ['category' => $category, 'tags' => $tags, 'products' => $products]);

    }
}
