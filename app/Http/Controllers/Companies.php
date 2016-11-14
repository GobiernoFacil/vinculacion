<?php

namespace App\Http\Controllers;

// libs
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Hash;
use File;
// models
use App\User;
use App\models\Vacant;
use App\models\Interview;
use App\models\Student;
use App\models\Contract;

use App\Http\Requests\UpdateCompanyRequest;
class Companies extends Controller
{
  // En esta carpeta se guardan las imágenes de los logos
  const UPLOADS = "img/logos";
  public $pageSize = 10;
  /*
   * D A S H B O A R D   Y   L I S T A   D E   O B J E T O S
   * ----------------------------------------------------------------
   */
  public function index(){
	// [1] el usuario del sistema
    $user     = Auth::user();
    $company  = $user->company;
    return view("companies.dashboard")->with([
     	"user"   => $user,
      "company" => $company
    ]);
  }

  // Las vacantes
  //
  //
  public function vacancies(){
    // [1] el usuario del sistema
    $user      = Auth::user();
    // [2] la empresa
    $company   = $user->company;
    // [3] las vacantes
    $vacancies = $user->company->vacancies()->paginate($this->pageSize);
    //User::where("type", "opd")->with("opd")->paginate($this->pageSize);

    // [4] regresa el view
    return view('companies.vacancies')->with([
      "user"      => $user,
      "company"   => $company,
      "vacancies" => $vacancies
    ]);
  }

  // Los convenios
  //
  //
  public function contracts(){
  	$user      = Auth::user();
  	$company   = $user->company;
  	return view('companies.contracts.contracts')->with([
      "user"      => $user,
      "company"   => $company,
    ]);
  }

  /*
   * P E R F I L   D E   L A   E M P R E S A
   * ----------------------------------------------------------------
   */

  public function me(){
	  // [1] el usuario del sistema
	  $user = Auth::user();
	  return view("companies.profile.me_view")->with([
     	"user"   => $user
    ]);
  }

  public function changeMe(){
    // [1] el usuario del sistema
    $user = Auth::user();
    $company  = User::with("company.contact")->find($user->id);
    return view("companies.profile.me_update")->with([
      "user"   => $user,
      "company" =>$company
    ]);
  }

  public function updateMe(UpdateCompanyRequest $request){
    $user = Auth::user();

    // update user
    $user->name  = $request->name;
    $user->email = $request->email;
    if(!empty($request->password)){
      $user->password = Hash::make($request->password);
    }
    $user->save();

    // update company
    $company_data = $request->only(['rfc', 'razon_social', 'nombre_comercial',
      'address', 'zip', 'phone','email','giro_comercial','alcance','type','size']);
/*
    if($request->hasFile('logo')) {
      $name = str_random(40);
      $request->file('logo')->move(public_path('img/logos'), $name);
      $company_data['logo'] = $name;
    }*/

    $user->company->update($company_data);
    //logo
    $path  = public_path(self::UPLOADS);
    // [ SAVE THE IMAGE ]
    if($request->hasFile('logo') && $request->file('logo')->isValid()){
      //[erase image]
      if($user->company->logo){
        File::delete(self::UPLOADS.'/'.$user->company->logo);
      }
      $name = uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
      $request->file('logo')->move($path, $name);
      $user->company->update(['logo'=>$name]);
    }


     if(!$user->company->contact){
      $user =  $user->company->contact()->firstOrCreate([]);
      // update company contact
      $user->contact->update([
        "name"  => $request->cname,
        "email" => $request->cemail,
        "phone" => $request->cphone,
      ]);
     }else{
       // update company contact
       $user->company->contact->update([
         "name"  => $request->cname,
         "email" => $request->cemail,
         "phone" => $request->cphone,
       ]);
     }


    // send to view
    return redirect("tablero-empresa/yo")->with("message",'Perfil actualizado correctamente');

  }

  public function validateMe(){
  }
}
