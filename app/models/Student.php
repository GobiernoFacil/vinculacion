<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
  protected $fillable = ['user_id','opd_id','creator_id','nombre','matricula','apellido_paterno',
                           'apellido_materno','curp','carrera','status','nombre_completo', 'semester'];


  //modelosrelacionados
  function user(){
    return $this->belongsTo("App\User");
  }

  //modelosrelacionados
  function Opd(){
    return $this->belongsTo("App\models\Opd");
  }

  //modelosrelacionados
  function interviews(){
    return $this->hasMany("App\models\Interview");
  }

  function applications(){
    return $this->hasMany("App\models\Applicant");
  }

  //modelosrelacionados
  function vacants(){
    return $this->hasMany("App\models\Vacant");
  }

  //modelosrelacionados
  function cv(){
    return $this->hasOne("App\models\Cv");
  }



}
