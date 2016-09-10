<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AcademicOffer extends Model
{
    //
    //modelosrelacionados
    function opd(){
      return $this->belongsTo("App\Opd");
    }

}
