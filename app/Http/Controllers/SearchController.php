<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use App\Product;

class SearchController extends Controller
{
    public function searchIndex(Request $request)
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
