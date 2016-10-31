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
use App\Http\Requests\UpdateVacancyRequest;

class CompanyVacancies extends Controller
{
  /*
   * V A C A N T E S
   * ----------------------------------------------------------------
   */
  public function view($id){
    // [1] el usuario del sistema
    $user      = Auth::user();

    // [2] la empresa
    $company   = $user->company;

    // [3] la vacante
    $vacancy = $user->company->vacancies()->find($id);

    // [4] regresa el view
    return view('companies.vacancies.vacancy-view')->with([
      "user"    => $user,
      "company" => $company,
      "vacancy" => $vacancy
    ]);
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
    $data = $request->only(['job', 'tags','age_from','age_to','travel', 'location', 'experience', 'salary',
                            'work_from', 'work_to', 'benefits', 'expenses', 'training', 'state',
                            'city', 'salary_min', 'salary_max', 'salary_type', 'salary_variable', 'salary_extra',
                            'personality', 'contract_level', 'contract_type', 'speciality', 'url']);

    $data['company_id'] = $user->company->id;
    $vacant = new Vacant();
    $vacant->save();
    $vacant->update($data);

    return redirect('tablero-empresa/vacantes')->with("message",'Vacante creada correctamente');
  }

  public function edit($id){
    $user    = Auth::user();
    $offer   = AcademicOffer::WhereNotNull('academic_name')->pluck('academic_name');
    $vacancy = $user->company->vacancies->find($id);

    return view("companies.vacancies.vacancy-update")->with([
      "user"    => $user,
      "vacancy" => $vacancy,
      "offer"   => $offer->toArray()
    ]);
  }

  public function update(UpdateVacancyRequest $request, $id){
    $user = Auth::user();
    $data = $request->only(['job', 'tags','age_from', 'age_to','travel', 'location', 'experience', 'salary',
                            'work_from', 'work_to', 'benefits', 'expenses', 'training', 'state',
                            'city', 'salary_min', 'salary_max', 'salary_type', 'salary_variable', 'salary_extra',
                            'personality', 'contract_level', 'contract_type', 'speciality', 'url']);

    $vacancy = $user->company->vacancies->find($id);
    $vacancy->update($data);
    return redirect('tablero-empresa/vacantes')->with("message",'Vacante actualizada correctamente');
  }

  public function delete($id){
    $user    = Auth::user();
    $vacancy = $user->company->vacancies->find($id);
    $vacancy->applicants()->delete();
    $vacancy->interviews()->delete();
    $vacancy->delete();
    return redirect('tablero-empresa/vacantes')->with("message",'Vacante eliminada correctamente');
  }

  public function enable($id){
    $user    = Auth::user();
    $vacancy = $user->company->vacancies->find($id);

    if($vacancy){
      $vacancy->status = ! $vacancy->status;
      $vacancy->update();
    }

    return redirect('tablero-empresa/vacantes');
  }

  public function disable($id){

  }





  /*
   * V A C A N C Y   D E T A I L S
   * ----------------------------------------------------------------
   */
  public function students($id, $page = 1){

  }


  public function student($vacancy_id, $student_id){
    $user      = Auth::user();
    $vacancy   = $user->company->vacancies()->find($vacancy_id);
    $applicant = $vacancy->applicants()->where("student_id", $student_id)->first();
    $student   = $applicant->student;

    return view("companies.vacancies.vacancy-applicant")->with([
      "user"      => $user,
      "vacancy"   => $vacancy,
      "applicant" => $applicant,
      "student"   => $student
    ]);
  }

  public function rateStudent($id){

  }

  public function interviews($id, $page = 1){

  }

  public function interviewAdd($vacancy_id, $student_id){
    $user      = Auth::user();
    $vacancy   = $user->company->vacancies()->find($vacancy_id);
    $applicant = $vacancy->applicants()->where("student_id", $student_id)->first();
    $student   = $applicant->student;
    $interview = new Interview();

    return view("companies.vacancies.interview-add")->with([
      "user"      => $user,
      "vacancy"   => $vacancy,
      "applicant" => $applicant,
      "student"   => $student,
      "interview" => $interview
    ]);
  }

  public function interviewSave(Request $request, $vacancy_id, $student_id){
    $user      = Auth::user();
    $vacancy   = $user->company->vacancies()->find($vacancy_id);
    $applicant = $vacancy->applicants()->where("student_id", $student_id)->first();
    $student   = $applicant->student;

    $interview             = Interview::firstOrCreate([
      "student_id" => $student->id,
      "company_id" => $user->company->id,
      "creator_id" => $user->id,
      "vacant_id"  => $vacancy->id
    ]);

    $interview->student_id = $student->id;
    $interview->company_id = $user->company->id;
    $interview->creator_id = $user->id;
    $interview->vacant_id  = $vacancy->id;
    $interview->contact    = $request->contact;
    $interview->email      = $request->email;
    $interview->phone      = $request->phone;
    $interview->address    = $request->contact;
    $interview->date       = $request->date;
    $interview->time       = $request->time;

    $interview->update();

    return redirect("tablero-empresa/vacante/{$vacancy->id}/entrevista/{$interview->id}");
  }

  public function interview($vacancy_id, $id){
    $user      = Auth::user();
    $vacancy   = $user->company->vacancies()->find($vacancy_id);
    $interview = $vacancy->interviews()->find($id);
    $student   = $interview->student;

    return view("companies.vacancies.interview")->with([
      "user"      => $user,
      "vacancy"   => $vacancy,
      "interview" => $interview,
      "student"   => $student
    ]);
  }
}
