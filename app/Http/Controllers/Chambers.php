<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Chambers extends Controller
{
  /*
   * D A S H B O A R D
   * ----------------------------------------------------------------
   */
  public function index(){
    return view("elcoruco-test")->with(["message" => "estás en el dashboard de cámaras!"]);
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
}
