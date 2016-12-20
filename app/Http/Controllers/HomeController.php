<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $cookie = $request->cookie('new');
        if ($cookie) {
            return view('index', ['new' => false]);
        } else {
            Cookie::queue('new', 'true', 999999);
            return view('index', ['new' => true]);
        }
    }
}
