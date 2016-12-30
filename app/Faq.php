<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected function search($query)
    {
        return self::where('question', 'LIKE', '%' . $query . '%')->get();
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
