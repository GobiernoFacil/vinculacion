<?php

namespace App\Http\Controllers;

// libs
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Hash;

// models
use App\User;
use App\models\Vacant;
use App\models\Interview;
use App\models\Student;
use App\models\Contract;

use App\Http\Requests\UpdateCompanyRequest;
class Companies extends Controller
{
  /*
   * D A S H B O A R D   Y   L I S T A   D E   O B J E T O S
   * ----------------------------------------------------------------
   */
  public function index(){
	// [1] el usuario del sistema, los convenios, las ofertas de trabajo y las entrevistas
    $user     = Auth::user();
    $company  = $user->company->with(["contracts.opd", "vacancies", "interviews.student"])->get();
    return view("companies.dashboard")->with([
     	"user"   => $user
    ]);
  }

  // Las vacantes
  //
  //
  public function vacancies(){

  }

  // Los convenios
  //
  //
  public function contracts(){

  }

  /*
   * P E R F I L   D E   L A   E M P R E S A
   * ----------------------------------------------------------------
   */

  public function me(){
	  // [1] el usuario del sistema
	  $user = Auth::user();
	  return view("companies.me_view")->with([
     	"user"   => $user
    ]);
  }

  public function changeMe(){
    // [1] el usuario del sistema
    $user = Auth::user();
    $company  = User::with("company.contact")->find($user->id);
    return view("companies.me_update")->with([
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
    $user->company->update($request->only(['rfc', 'razon_social', 'nombre_comercial', 'address', 'zip', 'phone','email','giro_comercial','alcance','type','size']));
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
    return redirect("tablero-empresa/yo");

  }

  public function validateMe(){
  }
}
