<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
protected $fillable =['company_id','opd_id', 'job', 'tags', 'age_from', 'age_to', 'travel', 'location',
                      'experience', 'salary', 'work_from', 'work_to', 'benefits', 'expenses', 'training', 
                      'state', 'city', 'salary_min', 'salary_max', 'salary_type', 'salary_variable',
                      'salary_extra', 'personality', 'contract_level', 'contract_type', 'speciality', 'status',
                      'for_company', 'url'];


                    // modelos relacionados
function company(){
    return $this->belongsTo("App\models\Company");
}

function applicants(){
    return $this->hasMany("App\models\Applicant");
}


}
