<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
  //
protected $fillable = ['user_id','opd_name','opd_description','opd_chancellor','opd_street','opd_ext_number','opd_int_number','opd_zip','opd_colony','opd_state','opd_city','opd_web',
                                             'opd_contact_name','opd_contact_position','opd_contact_email','opd_contact_phone','opd_contact_mobile'];

  //modelosrelacionados
  function user(){
   return $this->belongsTo("App\User");
  }

  //modelosrelacionados
  function student(){
   return $this->hasMany("App\Student");
  }

  //modelosrelacionados
  function contract(){
   return $this->hasMany("App\Contract");
  }

    //modelosrelacionados
  function AcademicOffer(){
    return $this->hasMany("App\AcademicOffer");
  }
}
