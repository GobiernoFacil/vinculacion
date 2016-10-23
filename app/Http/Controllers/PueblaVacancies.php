<?php

namespace App\Http\Controllers;

// Libs
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

// models
use App\models\AcademicOffer;
use App\models\Applicant;
use App\models\Contract;
use App\models\Interview;
use App\models\Vacant;

// requests
use App\Http\Requests\SaveVacantRequest;

class PueblaVacancies extends Controller
{
  public $pageSize = 10;
  /*
   * V A C A N T E S
   * ----------------------------------------------------------------
   */

  public function all(){
    // [1] el usuario del sistema
    $user      = Auth::user();

    // [2] las vacantes
    $vacancies = $user->vacancies()->paginate($this->pageSize);

    // [3] regresa el view
    return view('puebla.vacancies')->with([
      "user"      => $user,
      "vacancies" => $vacancies
    ]);
  }

  public function view($id){
    // [1] el usuario del sistema
    $user      = Auth::user();
    
    // [3] la vacante
    // secotrade tiene el poder oculto de poder ver cualquier vacante en su dashboard
    // pero pues, está oculto
    $vacancy = Vacant::find($id);

    // [4] regresa el view
    return view('puebla.vacancies.vacancy-view')->with([
      "user"    => $user,
      "company" => $company,
      "vacancy" => $vacancy
    ]);
  }

  public function add(){
    $user  = Auth::user();
    $offer = AcademicOffer::WhereNotNull('academic_name')->pluck('academic_name');

    return view("puebla.vacancies.vacancy-add")->with([
      "user"  => $user,
      "offer" => $offer->toArray()
    ]);
  }

  public function save(SaveVacantRequest $request){
    $user = Auth::user();
    $data = $request->only(['job', 'tags','age_from','age_to','travel', 'location', 'experience', 'salary',
                            'work_from', 'work_to', 'benefits', 'expenses', 'training', 'state',
                            'city', 'salary_min', 'salary_max', 'salary_type', 'salary_variable', 'salary_extra',
                            'personality', 'contract_level', 'contract_type', 'speciality', 'url', 'for_company']);

    $data['company_id'] = $user->id;
    $vacant = new Vacant();
    $vacant->save();
    $vacant->update($data);

    return redirect('tablero-secotrade/vacantes');
  }

  public function edit($id){
    $user    = Auth::user();
    $offer   = AcademicOffer::WhereNotNull('academic_name')->pluck('academic_name');
    $vacancy = Vacant::find($id);

    return view("puebla.vacancies.vacancy-update")->with([
      "user"    => $user,
      "vacancy" => $vacancy,
      "offer"   => $offer->toArray()
    ]);
  }

  public function update(Request $request, $id){
    $user = Auth::user();
    $data = $request->only(['job', 'tags','age_from', 'age_to','travel', 'location', 'experience', 'salary',
                            'work_from', 'work_to', 'benefits', 'expenses', 'training', 'state',
                            'city', 'salary_min', 'salary_max', 'salary_type', 'salary_variable', 'salary_extra',
                            'personality', 'contract_level', 'contract_type', 'speciality', 'url', 'for_company']);

    $vacancy = Vacant::find($id);
    $vacancy->update($data);
    return redirect('tablero-secotrade/vacantes');
  }

  public function delete($id){
    $vacancy = Vacant::find($id);
    $vacancy->applicants()->delete();
    $vacancy->interviews()->delete();
    $vacancy->delete();
    return redirect('tablero-secotrade/vacantes');
  }

  public function enable($id){
    $user    = Auth::user();
    $vacancy = Vacant::find($id);

    if($vacancy){
      $vacancy->status = ! $vacancy->status;
      $vacancy->update();
    }

    return redirect('tablero-secotrade/vacantes');
  }

  public function disable($id){

  }





  /*
   * V A C A N C Y   D E T A I L S
   * ----------------------------------------------------------------
   */
  public function students($id){

  }

  
  public function student($id){

  }

  public function rateStudent($id){

  }

  public function interviews($id){

  }

  public function interview($id){

  }
}
