<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
  protected $fillable = ["company_id", "vacant_id", "student_id", "has_interview"];
  
  function student(){
    return $this->belongsTo("App\models\Student");
  }

  function vacancy(){
    return $this->belongsTo("App\models\Vacant", "vacant_id");
  }

  function company(){
    return $this->belongsTo("App\models\Company");
  }
}
