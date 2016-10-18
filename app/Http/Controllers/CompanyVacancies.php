<?php

namespace App\Http\Controllers;

// Libs
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

// models
use App\models\Contract;
use App\models\AcademicOffer;
use App\models\Vacant;

// requests
use App\Http\Requests\SaveVacantRequest;

class CompanyVacancies extends Controller
{
  /*
   * V A C A N T E S
   * ----------------------------------------------------------------
   */
  public function view($id){

  }

  public function add(){
    $user  = Auth::user();
    $offer = AcademicOffer::WhereNotNull('academic_name')->pluck('academic_name');

    return view("companies.vacancies.vacancy-add")->with([
      "user"  => $user,
      "offer" => $offer->toArray()
    ]);
  }

  public function save(SaveVacantRequest $request){
    $user = Auth::user();
    $data = $request->only(['job', 'tags','age_from', 'travel', 'location', 'experience', 'salary',
                            'work_from', 'work_to', 'benefits', 'expenses', 'training', 'state',
                            'city', 'salary_min', 'salary_max', 'salary_type', 'salary_variable', 'salary_extra',
                            'personality', 'contract_level', 'contract_type', 'speciality', 'url']);

    $data['company_id'] = $user->company->id;
    $vacant = new Vacant();
    $vacant->save();
    $vacant->update($data);

    return redirect('tablero-empresa/vacantes');
  }

  public function edit($id){

  }

  public function update(Request $request, $id){

  }

  public function delete($id){

  }

  public function enable($id){

  }

  public function disable($id){

  }





  /*
   * V A C A N C Y   D E T A I L S
   * ----------------------------------------------------------------
   */
  public function students($id, $page = 1){

  }

  
  public function student($id){

  }

  public function rateStudent($id){

  }

  public function interviews($id, $page = 1){

  }

  public function interview($id){

  }
}
