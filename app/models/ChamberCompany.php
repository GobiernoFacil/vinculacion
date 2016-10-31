<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ChamberCompany extends Model
{
  protected $table = 'chamber_company';
    //
    protected $fillable = ['company_id','chamber_id'];

    public function chamber(){
      return $this->belongsTo('App\models\Chamber');
    }

    public function company(){
      return $this->hasOne('App\models\Company','id','company_id');
    }


}
