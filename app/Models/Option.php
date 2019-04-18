<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }
    public function color()
    {
    	return $this->belongsTo('App\Models\Color');
    }
    public function size()
    {
    	return $this->belongsTo('App\Models\Size');
    }
}
