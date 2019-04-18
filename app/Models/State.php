<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function countries()
    {
        return $this->hasMany('App\Country');
    }
    public function states()
    {
        return $this->hasMany('App\State');
    }
}
