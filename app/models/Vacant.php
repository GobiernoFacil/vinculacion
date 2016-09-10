<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
//
protected $fillable =['company_id','opd_id','academic_offer_id','vacant_name','vacant_location','vacant_schedule','vacant_salary','vacant_category','vacant_expiry_date','vacant_contract_type',
                    'vacant_number','vacant_description','vacant_requirements','vacant_observations'];


                    // modelos relacionados
function company(){
    return $this->belongsTo("App\Company");
}


}
