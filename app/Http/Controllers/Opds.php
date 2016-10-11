<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
// models
use App\User;

class Opds extends Controller
{
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
    return view('admin.dashboard')->with([
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

  }

  // Las empresas
  //
  //
  public function companies(){

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
   * P E R F I L   D E  L A   O P D
   * ----------------------------------------------------------------
   */

  public function me(){

  }

  public function changeMe(){

  }

  public function updateMe(){

  }
}
