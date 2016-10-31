<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //

    //
    protected $fillable=[/*'user_id','creator_id',*/'creator_id','rfc','razon_social','nombre_comercial','address',
                         'zip','phone','email','giro_comercial','alcance','type','size', 'logo'];


    // modelos relacionados
    function user(){
      return $this->belongsTo("App\User");
    }


    // modelos relacionados
    function chamber(){
      return $this->belongsTo("App\models\Chamber");
    }


    // modelos relacionados
    function contracts(){
      return $this->hasMany("App\models\Contract");
    }

    // modelos relacionados
    function vacancies(){
      return $this->hasMany("App\models\Vacant");
    }

    // modelos relacionados
    function interviews(){
      return $this->hasMany("App\models\Interview");
    }
    // modelos relacionados
    public function contact()
    {
      return $this->morphOne('App\models\Contact', 'contact');
    }

    public function company(){
     return $this->belongsTo('App\models\ChamberCompany','company_id');
   }
}
