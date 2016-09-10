<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //

    //
    protected $fillable = ['user_id','opd_name','opd_description','opd_chancellor','opd_street','opd_ext_number','opd_int_number','opd_zip','opd_colony','opd_state','opd_city','opd_web',
                           'opd_contact_name','opd_contact_position','opd_contact_email','opd_contact_phone','opd_contact_mobile'];

    // modelos relacionados
    function user(){
      return $this->belongsTo("App\User");
    }


    // modelos relacionados
    function chamber(){
      return $this->belongsTo("App\Chamber");
    }


    // modelos relacionados
    function contract(){
      return $this->hasMany("App\Contract");
    }

    // modelos relacionados
    function vacant(){
      return $this->hasMany("App\Vacant");
    }

    // modelos relacionados
    function interview(){
      return $this->hasMany("App\Interview");
    }
}
