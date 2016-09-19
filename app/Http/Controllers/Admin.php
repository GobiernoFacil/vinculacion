<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
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
  public $pageSize = 10;

  /*
   * D A S H B O A R D   Y   L I S T A   D E   O B J E T O S
   * ----------------------------------------------------------------
   */

  // El dashboard
  //
  //
  public function index(){
        $user = Auth::user();
        $data                = [];
        $data['title']       = 'Dashboard | ';
        $data['description'] = 'Dashboard de Vinculación';
        $data['body_class']  = 'dashboard';

        $admins = User::where("type", "admin")->where("id", "!=", $user->id)->take(5)->get();
        //$students
        //$companies
        //$chambers
        $opds     = User::where("type", "opd")->with("opd")->take(5)->get();

        return view('admin.dashboard_admin_view')->with([
          "user" => $user,
          "data" => $data,

          // users
          "admins" => $admins,
          "opds" => $opds
        ]);
  }

  /*
  // Todos los usuarios
  //
  //
  public function users(Request $request){
    // posible ejemplo de cómo manejar todas las listas de lo que sea
    $user  = Auth::user();
    $users = User::paginate($this->pageSize);
    return view('admin.dashboard_admin_view')->with([
      "user"  => $me,
      "users" => $users
    ]);
  }
  */

  // Los administradores
  //
  //
  public function admins(Request $request){
    $user   = Auth::user();
    $admins = User::where("type", "admin")
                 ->where("id", "!=", $user->id)->paginate($this->pageSize);
    
    return view('admin.admin_list')->with([
      "user"   => $user,
      "admins" => $admins
    ]);
  }

  // Las cámaras
  //
  //
  public function chambers(Request $request){

  }

  // Las opds
  //
  //
  public function opds(Request $request){
    $user   = Auth::user();
    $opds = User::where("type", "opd")->paginate($this->pageSize);
    
    return view('admin.opd_list')->with([
      "user" => $user,
      "opds" => $opds
    ]);
  }

  // Los estudiantes
  //
  //
  public function students(Request $request){

  }

  // Las empresas
  //
  //
  public function companies(Request $request){

  }

  // Las vacantes
  //
  //
  public function vacancies(Request $request){

  }

  // Los convenios
  //
  //
  public function contracts(Request $request){

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
