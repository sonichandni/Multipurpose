<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function city()
    {
        return $this->belongsTo('App\State');
    }
}