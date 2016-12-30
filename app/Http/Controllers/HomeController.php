<?php

namespace App\Http\Controllers;

use App\Category;
use App\Faq;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $cookie = $request->cookie('new');
        $new = false;

        $hotItems = Product::where('hot', true)->orderBy('hot_order', 'asc')->get();
        $categories = Category::all();
        $faqs = Faq::all();

        if (!$cookie) {
            $new = true;
            Cookie::queue('new', 'true', 999999);
        }
        return view('index', ['new' => $new, 'hotItems' => $hotItems, 'categories' => $categories, 'faqs' => $faqs]);
    }

}
