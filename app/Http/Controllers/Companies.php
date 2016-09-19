<?php

namespace App\Http\Controllers;

// libs
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Hash;

class Companies extends Controller
{
  /*
   * D A S H B O A R D   Y   L I S T A   D E   O B J E T O S
   * ----------------------------------------------------------------
   */
  public function index(){
	// [1] el usuario del sistema
    $user = Auth::user();
    return view("companies.dashboard")->with([
     	"user"   => $user
    ]);
  }

  // Las vacantes
  //
  //
  public function vacancies($page = 1){

  }

  // Los convenios
  //
  //
  public function contracts($page = 1){

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

  }

  public function updateMe(){

  }

  public function validateMe(){
  }
}