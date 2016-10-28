<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
  //
protected $fillable = ["opd_name", "url", "city", "state", "address", "zip"];

  //modelosrelacionados
  function user(){
   return $this->belongsTo("App\User");
  }

  //modelosrelacionados
  function students(){
   return $this->hasMany("App\models\Student");
  }

  //modelosrelacionados
  function contracts(){
   return $this->hasMany("App\models\Contract");
  }

    //modelosrelacionados
  function AcademicOffer(){
    return $this->hasMany("App\models\AcademicOffer");
  }

  public function contact()
  {
    return $this->morphOne('App\models\Contact', 'contact');
  }

  public function companies()
  {
    return $this->hasMany('App\models\Company', 'creator_id');
  }
}
