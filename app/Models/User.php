<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;

class User extends Authenticatable 
{
    use HasEncryptedAttributes;
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type',
    ];
    // protected $encrypted = [
    //     'name', 'email', 'type',
    // ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
