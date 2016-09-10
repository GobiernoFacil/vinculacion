<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['student_registration_id','user_id','opd_id','creator_id','user_id','creator_id','student_name','student_primary_last_name','student_second_last_name',
                           'student_street','student_ext_number','student_int_number','student_zip','student_colony','student_state','student_city','student_phone','student_mobile'];


  //modelosrelacionados
  function user(){
    return $this->belongsTo("App\User");
  }

  //modelosrelacionados
  function Opd(){
    return $this->belongsTo("App\Opd");
  }



}
