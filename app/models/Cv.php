<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
  protected $fillable = ['student_id', 'age', 'city', 'state', 'country', 'phone', 'mobile', 'email'];
    //

  public function academic_trainings(){
    return $this->hasMany('App\models\AcademicTraining');
  }

  public function experiences(){
    return $this->hasMany('App\models\Experience');
  }

  public function further_trainings(){
    return $this->hasMany('App\models\FurtherTraining');
  }

  public function languages(){
    return $this->hasMany('App\models\Language');
  }

  public function softwares(){
    return $this->hasMany('App\models\Language');
  }
}
