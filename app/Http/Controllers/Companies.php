<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Companies extends Controller
{
  /*
   * D A S H B O A R D   Y   L I S T A   D E   O B J E T O S
   * ----------------------------------------------------------------
   */
  public function index(){
    return view("companies.dashboard");
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

  }

  public function changeMe(){

  }

  public function updateMe(){

  }

  public function validateMe(){
  }
}