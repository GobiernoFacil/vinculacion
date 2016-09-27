<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Chamber extends Model
{
    //
    protected $fillable = ['chamber_rfc','chamber_comercial_name','chamber_social_reason','chamber_comercial_activity',
                           'chamber_activity_sector','chamber_sector','chamber_description','chamber_ceo','chamber_street',
                           'chamber_ext_number','chamber_int_number','chamber_zip','chamber_colony','chamber_state','chamber_city',
                           'chamber_web','chamber_contact_name','chamber_contact_position','chamber_contact_email',
                           'chamber_contact_phone','chamber_contact_mobile'];

    // modelos relacionados
    function company(){
      return $this->hasMany("App\models\Company");
    }

    //modelosrelacionados
    function user(){
     return $this->belongsTo("App\User");
    }
}
