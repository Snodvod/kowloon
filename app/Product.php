<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'hot', 'hot_order'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
