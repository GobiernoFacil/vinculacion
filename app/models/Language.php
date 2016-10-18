<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
  protected $fillable = ['cv_id', 'name', 'level'];
    //

  public function cv(){
    return $this->belongsTo('App\models\Cv');
  }
}
