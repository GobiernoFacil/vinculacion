<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AcademicOffer extends Model
{
  protected $fillable = ['academic_name'];
    //
    //modelosrelacionados
    function opd(){
      return $this->belongsTo("App\Opd");
    }

}
