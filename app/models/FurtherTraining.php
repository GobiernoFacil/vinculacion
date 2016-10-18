<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class FurtherTraining extends Model
{
  protected $fillable = ['cv_id', 'name', 'from', 'to', 'location', 'city', 'hours'];
    //

  public function cv(){
    return $this->belongsTo('App\models\Cv');
  }
    //
}
