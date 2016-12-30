<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');

        $page = $request->get('page');

        if ($page == 's') {
            $categoryString = $request->get('c');
            $min = $request->get('min');
            $max = $request->get('max');


            if ($categoryString != '') {
                $categories = str_split($categoryString);

                return Product::search($query, $min, $max, $categories);
            } else {

                return Product::search($query, $min, $max);
            }
        } else {
            return Faq::search($query);
        }
    }
}
