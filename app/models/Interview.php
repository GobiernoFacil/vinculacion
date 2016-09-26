<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    //
    protected $fillable = ['student_id','company_id','creator_id'];

    //modelosrelacionados
    function company(){
      return $this->belongsTo("App\models\Company");
    }

    //modelosrelacionados
    function student(){
      return $this->belongsTo("App\models\Student");
    }

}
