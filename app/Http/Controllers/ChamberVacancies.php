<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\models\Vacant;
use App\models\Company;
use App\models\ChamberCompany;
use App\models\AcademicOffer;
class ChamberVacancies extends Controller
{
  /*
   * V A C A N T E S
   * ----------------------------------------------------------------
   */

  public function view($id_company,$id_vacant){
    // [1] el usuario del sistema
    $user      = Auth::user();
    $chamber   = $user->chamber;
    // [2] la vacante
    $element       = ChamberCompany::where('chamber_id',$chamber->id)->where('company_id',$id_company)->with('company')->firstOrCreate([]);
    $vacancy       = $element->company->vacancies->find($id_vacant);

    // [4] regresa el view
    return view('chambers.vacancies.vacancy-view')->with([
      "user"    => $user,
      "vacancy" => $vacancy
    ]);
  }

  public function add(){
    $user    = Auth::user();
    $offer   = AcademicOffer::WhereNotNull('academic_name')->pluck('academic_name');
    $chamber       = $user->chamber;
    $companies_id     = ChamberCompany::where('chamber_id',$chamber->id)->with('company')->get()->pluck('id');
    $companies     = Company::WhereNotNull('nombre_comercial')->whereIn('id', $companies_id)->pluck('nombre_comercial');
    $all           = Company::WhereNotNull('nombre_comercial')->whereIn('id', $companies_id)->pluck('id','nombre_comercial');

    return view("chambers.vacancies.vacancy-add")->with([
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

    return redirect('tablero-camara/vacantes')->with("message",'Vacante creada correctamente');
  }

  public function edit($id_company,$id_vacant){
    $user    = Auth::user();
    $offer   = AcademicOffer::WhereNotNull('academic_name')->pluck('academic_name');
    $chamber       = $user->chamber;
    $companies_id     = ChamberCompany::where('chamber_id',$chamber->id)->with('company')->get()->pluck('id');
    $companies     = Company::WhereNotNull('nombre_comercial')->whereIn('id', $companies_id)->pluck('nombre_comercial');
    $all           = Company::WhereNotNull('nombre_comercial')->whereIn('id', $companies_id)->pluck('id','nombre_comercial');
    $element       = ChamberCompany::where('chamber_id',$chamber->id)->where('company_id',$id_company)->with('company')->firstOrCreate([]);
    $vacancy       = $element->company->vacancies->find($id_vacant);
    return view("chambers.vacancies.vacancy-update")->with([
      "user"  => $user,
      "offer" => $offer->toArray(),
      "companies" => $companies->toArray(),
      "all" =>$all->toArray(),
      "vacancy" => $vacancy,
    ]);
  }

  public function update(Request $request, $id_company,$id_vacant){
    $user = Auth::user();
    $chamber       = $user->chamber;
    $data = $request->only(['job', 'tags','age_from', 'age_to','travel', 'location', 'experience', 'salary',
                            'work_from', 'work_to', 'benefits', 'expenses', 'training', 'state',
                            'city', 'salary_min', 'salary_max', 'salary_type', 'salary_variable', 'salary_extra',
                            'personality', 'contract_level', 'contract_type', 'speciality', 'url','company_id']);
    $element       = ChamberCompany::where('chamber_id',$chamber->id)->where('company_id',$id_company)->with('company')->firstOrCreate([]);
    $vacancy       = $element->company->vacancies->find($id_vacant);
    $vacancy->update($data);
    return redirect('tablero-camara/vacantes')->with("message",'Vacante actualizada correctamente');
  }

  public function delete($id_company,$id_vacant){
    $user    = Auth::user();
    $chamber       = $user->chamber;
    $element       = ChamberCompany::where('chamber_id',$chamber->id)->where('company_id',$id_company)->with('company')->firstOrCreate([]);
    $vacancy       = $element->company->vacancies->find($id_vacant);
    $vacancy->applicants()->delete();
    $vacancy->interviews()->delete();
    $vacancy->delete();
    return redirect('tablero-camara/vacantes')->with("message",'Vacante eliminada correctamente');

  }

  public function enable($id_company,$id_vacant){
    $user    = Auth::user();
    $chamber       = $user->chamber;
    $element       = ChamberCompany::where('chamber_id',$chamber->id)->where('company_id',$id_company)->with('company')->firstOrCreate([]);
    $vacancy       = $element->company->vacancies->find($id_vacant);

    if($vacancy){
      $vacancy->status = ! $vacancy->status;
      $vacancy->update();
    }

    return redirect('tablero-camara/vacantes')->with("message",'Vacante actualizada correctamente');
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
