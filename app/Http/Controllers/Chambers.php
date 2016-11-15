<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use File;
use Auth;
use App\Http\Requests\UpdateChamberProfileRequest;
use App\models\ChamberCompany;
use App\models\Vacant;
class Chambers extends Controller
{

    // En esta carpeta se guardan las imágenes de los logos
    const UPLOADS = "img/logos";
  // El tamaño de la paginación
  public $pageSize = 10;
  /*
  * D A S H B O A R D
  * ----------------------------------------------------------------
  */
  public function index(){
    $user = Auth::user();
    $chamber = $user->chamber;
    $companies_id  = ChamberCompany::where('chamber_id',$chamber->id)->with('company')->get()->pluck('company_id');
    $companies_num = $chamber->chamberCompany->count();
    $vacancies_num    = Vacant::WhereNotNull('job')->whereIn('company_id', $companies_id)->count();
    return view("chambers.dashboard")->with([
      "user" => $user,
      "chamber"  =>$chamber,
      "c_num"     =>$companies_num,
      "v_num" => $vacancies_num
    ]);
  }

  /*
  * P E R F I L   D E   L A   C Á M A R A
  * ----------------------------------------------------------------
  */

  public function me(){
    $user = Auth::user();
    $chamber = $user->chamber;
    return view("chambers.me.me")->with([
      "user" => $user,
      "chamber"  =>$chamber
    ]);
  }

  public function changeMe(){
    $user = Auth::user();
    $chamber = $user->chamber->with('contact')->firstOrCreate([]);
    return view("chambers.me.me-update")->with([
      "user" => $user,
      "chamber" => $chamber
    ]);
  }

  public function updateMe(UpdateChamberProfileRequest $request){
    $user = Auth::user();
    $chamber = $user->chamber;
    // update company
    $chamber->update($request->only(['chamber_rfc', 'chamber_comercial_name', 'chamber_street', 'chamber_zip','chamber_web','chamber_city','chamber_state']));
    //logo
    $path  = public_path(self::UPLOADS);
    // [ SAVE THE IMAGE ]
    if($request->hasFile('logo') && $request->file('logo')->isValid()){
      //[erase image]
      if($chamber->chamber_logo){
        File::delete(self::UPLOADS.'/'.$chamber->chamber_logo);
      }
      $name = uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
      $request->file('logo')->move($path, $name);
      $chamber->chamber_logo = $name;
      $chamber->save();
    }

    if(!$chamber->contact){
      $chamber = $chamber->contact()->firstOrCreate([]);
      // update company contact
      $chamber->contact->update([
        "name"  => $request->cname,
        "email" => $request->cemail,
        "phone" => $request->cphone,
      ]);
    }else{
      // update company contact
      $chamber->contact->update([
        "name"  => $request->cname,
        "email" => $request->cemail,
        "phone" => $request->cphone,
      ]);
    }
    return redirect("tablero-camara/yo")->with('message','Perfil actualizado correctamente');
  }

  public function companies(){
    // [1] el usuario del sistema
    $user     = Auth::user();
    $chamber  = $user->chamber;

    // [2] empresas
    $companies_num = $chamber->chamberCompany->count();
    $companies     = $chamber->chamberCompany()->with('company')->paginate($this->pageSize);

    // [3] regresa el view
    return view('chambers.companies.companies-list')->with([
      "user"     => $user,
      "companies" => $companies,
      "c_num"     =>$companies_num
    ]);
  }

  public function vacancies(){
    // [1] el usuario del sistema
    $user     = Auth::user();
    $chamber  = $user->chamber;

    // [2] vacantes
    $companies_id  = ChamberCompany::where('chamber_id',$chamber->id)->with('company')->get()->pluck('company_id');
    $companies_num = Vacant::WhereNotNull('job')->whereIn('company_id', $companies_id)->count();
    $vacancies     = Vacant::WhereNotNull('job')->whereIn('company_id', $companies_id)->paginate($this->pageSize);

    // [3] regresa el view
    return view('chambers.vacancies.vacancy-list')->with([
      "user"     => $user,
      "vacancies" => $vacancies,
      "c_num"     =>$companies_num
    ]);
  }
}
