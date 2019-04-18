<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function options()
    {
    	return $this->hasMany('App\Models\Option');
    }
}
