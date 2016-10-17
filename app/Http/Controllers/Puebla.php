<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Puebla extends Controller
{
  /*
   * D A S H B O A R D
   * ----------------------------------------------------------------
   */
  public function index(){
    return view("elcoruco-test")->with(["message" => "estás en el dashboard de la dirección general del servicio estatal del empleo!"]);
  }

  /*
   * P E R F I L   D E   L A   S E C O T R A D E
   * ----------------------------------------------------------------
   */

  public function me(){

  }

  public function changeMe(){

  }

  public function updateMe(){

  }
}
