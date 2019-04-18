<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function product()
    {
    	return $this->belongTo('App\Models\Product');
    }
}
