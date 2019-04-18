<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function product()
    {
    	return $this->belongTo('App\Models\Product');
    }
}
