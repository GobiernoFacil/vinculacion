<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //modelosrelacionados
    function opd(){
     return $this->hasOne("App\Opd");
    }

    //modelosrelacionados
    function company(){
     return $this->hasOne("App\Company");
    }

    //modelosrelacionados
    function student(){
     return $this->hasOne("App\Student");
    }

    //modelosrelacionados
    function chamber(){
     return $this->hasOne("App\Chamber");
    }
}
