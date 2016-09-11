<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// models
use App\User;
use App\models\Chamber;
use App\models\Company;
use App\models\Contract;
use App\models\Opd;
use App\models\Student;
use App\models\Vacancy;

class Admin extends Controller
{
  /*
   * D A S H B O A R D   Y   L I S T A   D E   O B J E T O S
   * ----------------------------------------------------------------
   */

  // El dashboard
  //
  //
  public function index(){

  }

  // Todos los usuarios
  //
  //
  public function users(Request $request, $page = 1){

  }

  // Los administradores
  //
  //
  public function admins(Request $request, $page = 1){

  }

  // Las cámaras
  //
  //
  public function chambers(Request $request, $page = 1){

  }

  // Las opds
  //
  //
  public function opds(Request $request, $page = 1){

  }

  // Los estudiantes
  //
  //
  public function students(Request $request, $page = 1){

  }

  // Las empresas
  //
  //
  public function companies(Request $request, $page = 1){

  }

  // Las vacantes
  //
  //
  public function vacancies(Request $request, $page = 1){

  }





  /*
   * P E R F I L   D E L   A D M I N I S T R A D O R
   * ----------------------------------------------------------------
   */

  public function me(){

  }

  public function changeMe(){

  }

  public function updateMe(){

  }





  /*
   * A D M I N I S T R A D O R E S
   * ----------------------------------------------------------------
   */

  public function view($id){

  }

  public function add(){

  }

  public function save(Request $request){

  }

  public function edit($id){

  }

  public function update(Request $request, $id){

  }

  public function delete($id){

  }

}
