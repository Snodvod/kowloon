<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'hot', 'hot_order'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function faqs()
    {
        return $this->hasMany('App\Tag');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    protected function search($query, $min, $max, $cats = [1, 2, 3, 4, 5, 6])
    {
        return DB::table('products')
            ->select('products.*', 'images.image')
            ->join('images', 'images.product_id', '=', 'products.id')
            ->where('name', 'LIKE', '%' . $query . '%')
            ->whereBetween('price', [$min, $max])
            ->whereIn('category_id', $cats)
            ->get();
    }
}
