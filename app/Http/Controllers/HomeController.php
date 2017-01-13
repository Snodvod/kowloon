<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\Contact;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

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
        $categories = Category::All();

        $hotItems = Product::where('hot', true)->orderBy('hot_order', 'asc')->get();


        if (!$cookie) {
            $new = true;
            Cookie::queue('new', 'true', 999999);
        }
        return view('index', ['new' => $new, 'hotItems' => $hotItems, 'categories' => $categories]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact(Request $request)
    {
        Mail::to('inovanwinckel@hotmail.com')->send(new Contact($request->email, $request->message));
        return redirect('/');
    }

}
