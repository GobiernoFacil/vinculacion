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
        'name', 'email', 'password','type','enabled'
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
     return $this->hasOne("App\models\Opd");
    }

    //modelosrelacionados
    function company(){
     return $this->hasOne("App\models\Company");
    }

    //modelosrelacionados
    function student(){
     return $this->hasOne("App\models\Student");
    }

    //modelosrelacionados
    function chamber(){
     return $this->hasOne("App\models\Chamber");
    }

    //modelosrelacionados
    // esto solo funciona para la secotrade y la cámara de comercio, no usar para otro!
    function vacancies(){
     return $this->hasMany("App\models\Vacant", "company_id");
    }
}
