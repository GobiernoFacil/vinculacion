<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
//

//
protected $fillable=['company_id','opd_id','contract_timestamp','contract_opd','contract_name','contract_objective','contract_description','contract_short_description','contract_benefit_students',
                      'contract_participant_students','contract_benefit_teachers','contract_participant_teachers','contract_federal_budget','contract_state_budget','contract_own_budget',
                      'contract_funding_source','contract_signature_date','contract_expiry_date','contract_responsable_name','contract_responsable_email'
                    ];


//modelosrelacionados
function opd(){
return $this->belongsTo("App\Opd");
}

//modelosrelacionados
function company(){
return $this->belongsTo("App\Company");
}


}
