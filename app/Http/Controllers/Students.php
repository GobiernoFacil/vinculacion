<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Students extends Controller
{
  /*
   * D A S H B O A R D
   * ----------------------------------------------------------------
   */
  public function index(){
    return view("elcoruco-test")->with(["message" => "estás en el dashboard de estudiante!"]);
  }

  /*
   * P E R F I L   D E L   E S T U D I A N T E
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

  /*
   * C V
   * ----------------------------------------------------------------
   */
  public function viewCV($id){

  }

  public function editCV($id){

  }

  public function updateCV(Request $request, $id){

  }
}
