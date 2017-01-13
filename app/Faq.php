<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question', 'answer'];

    protected function search($query)
    {
        return self::where('question', 'LIKE', '%' . $query . '%')->get();
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
