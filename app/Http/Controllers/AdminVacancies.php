<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\models\Vacant;
use App\models\Company;
use App\models\AcademicOffer;
class AdminVacancies extends Controller
{
  /*
   * V A C A N T E S
   * ----------------------------------------------------------------
   */

  public function view($id){
    // [1] el usuario del sistema
    $user      = Auth::user();

    // [2] la vacante
    $vacancy = Vacant::with('company')->find($id);

    // [4] regresa el view
    return view('admin.vacancies.vacancy-view')->with([
      "user"    => $user,
      "vacancy" => $vacancy
    ]);
  }

  public function add(){
    $user    = Auth::user();
    $offer   = AcademicOffer::WhereNotNull('academic_name')->pluck('academic_name');
    $companies = Company::WhereNotNull('nombre_comercial')->pluck('nombre_comercial');
    $all     = Company::WhereNotNull('nombre_comercial')->pluck('id','nombre_comercial');

    return view("admin.vacancies.vacancy-add")->with([
      "user"  => $user,
      "offer" => $offer->toArray(),
      "companies" => $companies->toArray(),
      "all" =>$all->toArray()
    ]);
  }

  public function save(Request $request){
    $user = Auth::user();
    $data = $request->only(['job', 'tags','age_from','age_to','travel', 'location', 'experience', 'salary',
                            'work_from', 'work_to', 'benefits', 'expenses', 'training', 'state',
                            'city', 'salary_min', 'salary_max', 'salary_type', 'salary_variable', 'salary_extra',
                            'personality', 'contract_level', 'contract_type', 'speciality', 'url','company_id']);

    $vacant = new Vacant();
    $vacant->save();
    $vacant->update($data);

    return redirect('dashboard/vacantes')->with("message",'Vacante creada correctamente');
  }

  public function edit($id){
    $user    = Auth::user();
    $offer   = AcademicOffer::WhereNotNull('academic_name')->pluck('academic_name');
    $vacancy = Vacant::find($id);
    $companies = Company::WhereNotNull('nombre_comercial')->pluck('nombre_comercial');
    $all     = Company::WhereNotNull('nombre_comercial')->pluck('id','nombre_comercial');

    return view("admin.vacancies.vacancy-update")->with([
      "user"    => $user,
      "vacancy" => $vacancy,
      "offer"   => $offer->toArray(),
      "companies" => $companies->toArray(),
      "all" =>$all->toArray()
    ]);
  }

  public function update(Request $request, $id){
    $user = Auth::user();
    $data = $request->only(['job', 'tags','age_from', 'age_to','travel', 'location', 'experience', 'salary',
                            'work_from', 'work_to', 'benefits', 'expenses', 'training', 'state',
                            'city', 'salary_min', 'salary_max', 'salary_type', 'salary_variable', 'salary_extra',
                            'personality', 'contract_level', 'contract_type', 'speciality', 'url','company_id']);

    $vacancy = Vacant::find($id);
    $vacancy->update($data);
    return redirect('dashboard/vacantes')->with("message",'Vacante actualizada correctamente');
  }

  public function delete($id){
    $user    = Auth::user();
    $vacancy = Vacant::find($id);
    $vacancy->applicants()->delete();
    $vacancy->interviews()->delete();
    $vacancy->delete();
    return redirect('dashboard/vacantes')->with("message",'Vacante eliminada correctamente');
  }

  public function enable($id){

  }

  public function disable($id){

  }

  public function students($id, $page = 1){

  }
}
