<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
// models
use App\User;

class Opds extends Controller
{
  // el tamaño de la paginación
  public $pageSize = 10;

  /*
   * D A S H B O A R D   Y   L I S T A   D E   O B J E T O S
   * ----------------------------------------------------------------
   */

  // El dashboard
  //
  //
  public function index(){
    // [1] el usuario del sistema
    $user = Auth::user();

    // [2] contamos cuántos de cada uno
    $opd       = $user->opd;
    $students  = $opd->students->count();
    $companies = $opd->companies->count();
    $contracts = $opd->contracts->count();

    // [3] regresa el view
    return view('opds.dashboard')->with([
      "user"      => $user,
      // students
      "students"  => $students,
      // companies
      "companies" => $companies,
      // contracts
      "contracts" => $contracts
    ]);
  }

  // Las cámaras
  //
  //
  public function chambers(){

  }

  // Los estudiantes
  //
  //
  public function students(){
    // [1] el usuario del sistema
    $user     = Auth::user();
    $opd = $user->opd;
    // [2] estudiantes
    $students_num = $opd->students->count();
    $students     = $opd->students()->paginate($this->pageSize);

    // [3] regresa el view
    return view('opds.students.students-list')->with([
      "user"     => $user,
      "students" => $students
    ]);
  }

  // Las empresas
  //
  //
  public function companies(){
    // [1] el usuario del sistema
    $user = Auth::user();
    $opd  = $user->opd;

    // [2] empresas
    $companies_num = $opd->companies->count();
    $companies     = $opd->companies()->paginate($this->pageSize);

    // [3] regresa el view
    return view('opds.companies.companies-list')->with([
      "user"     => $user,
      "companies" => $companies
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
  	$user = Auth::user();
    $opd = $user->opd;
    $contracts_num = $opd->contracts->count();
    $contracts     = $opd->contracts()->paginate($this->pageSize);

    return view("opds.contracts.list")->with([
      "user" => $user,
      "contracts"  =>$contracts
    ]);


  }


  /*
   * ESTADISTICAS   D E  L A   O P D
   * ----------------------------------------------------------------
   */

   public function stats(){
    $user = Auth::user();
    $opd = $user->opd;
    return view("opds.stats.reports")->with([
      "user" => $user,
      "opd"  =>$opd
    ]);
  }

  /*
   * P E R F I L   D E  L A   O P D
   * ----------------------------------------------------------------
   */

  public function me(){
    $user = Auth::user();
    $opd = $user->opd;
    return view("opds.me.me")->with([
      "user" => $user,
      "opd"  =>$opd
    ]);
  }

  public function changeMe(){
    $user = Auth::user();
    $opd = $user->opd;
    return view("opds.me.me-update")->with([
      "user" => $user,
      "opd"  =>$opd
    ]);
  }

  public function updateMe(Request $request){
      $user = Auth::user();
      $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
          $user->password = Hash::make($request->password);
        }
     $user->save();
     $opd = $user->opd;
     $opd->update($request->only(['address', 'zip', 'city', 'state', 'url']));
     $opd->opd_name = $request->name;
     $opd->save();
     return redirect("tablero-opd/yo");

  }
}
