<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function options()
    {
    	return $this->hasMany('App\Models\Option');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function ratings()
    {
    	return $this->hasMany('App\Models\Rating');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
