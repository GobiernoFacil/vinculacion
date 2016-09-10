<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
  //
  protected $fillable=['user_id','creator_id','company_rfc','company_email','company_comercial_name','company_social_reason','company_comercial_activity','company_activity_sector','company_sector',
                      'company_description','company_ceo','company_street','company_ext_number','company_int_number','company_zip','company_colony','company_state','company_city','company_web',
                      'company_contact_name','company_contact_position','company_contact_email','company_contact_phone','company_contact_mobile'];

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
