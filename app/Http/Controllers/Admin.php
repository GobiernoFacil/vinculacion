<?php

namespace App\Http\Controllers;

// libs
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Hash;

// models
use App\User;
use App\models\Chamber;
use App\models\Company;
use App\models\Contract;
use App\models\Opd;
use App\models\Student;
use App\models\Vacancy;

// FormValidators
use App\Http\Requests\UpdateAdminRequest;

class Admin extends Controller
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

    // [2] información del view. Hay que buscar la manera de quitarla de aquí o algo :P
    $data                = [];
    $data['title']       = 'Dashboard | ';
    $data['description'] = 'Dashboard de Vinculación';
    $data['body_class']  = 'dashboard';
    
    // [3] cinco de cada cosa, como en el arca de noé. Bueno, el otro noé
    $admins = User::where("type", "admin")->where("id", "!=", $user->id)->take(5)->get();
    $opds   = User::where("type", "opd")->with("opd")->take(5)->get();

    // [4] regresa el view
    return view('admin.dashboard_admin_view')->with([
      "user" => $user,
      "data" => $data,

      // users
      "admins" => $admins,
      "opds"   => $opds
    ]);
  }

  // Los administradores
  // nota: los admins no tienen información fuera del usuario
  //
  public function admins(Request $request){
    // [1] el usuario del sistema
    $user   = Auth::user();

    // [2] todos los usuarios que no son el que está usuando el sistema.
    //     la guía de paginación está aquí:
    //     https://laravel.com/docs/5.2/pagination
    //
    //     en el view se muestra la paginación básica, aunque no está mal.
    $admins = User::where("type", "admin")
                 ->where("id", "!=", $user->id)->paginate($this->pageSize);
    
    // [3] regresa el view
    return view('admin.admin_list')->with([
      "user"   => $user,
      "admins" => $admins
    ]);
  }

  // Las opds
  // **** EL EJEMPLO PARA LAS LISTAS DE USUARIOS ****
  //
  public function opds(Request $request){
    // [1] el usuario del sistema
    $user   = Auth::user();
    // [2] las universidades; esta maroma hace automático lo de la paginación, basta con pasar el
    //      número de elementos por página. Para más info:
    //      https://laravel.com/docs/5.2/pagination
    $opds = User::where("type", "opd")->with("opd")->paginate($this->pageSize);
    
    // [3] regresa el view
    return view('admin.opd_list')->with([
      "user" => $user,
      "opds" => $opds
    ]);
  }

  // Las cámaras
  //
  //
  public function chambers(Request $request){

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
    $user = Auth::user();

    return view("admin.me")->with([
      "user" => $user
    ]);
  }

  public function changeMe(){
    $user = Auth::user();

    return view("admin.me_form")->with([
      "user" => $user
    ]);
  }

  public function updateMe(UpdateAdminRequest $request){
    // La validación de esta maroma está aquí:
    // App\Http\Requests\UpdateAdminRequest

    // [1] el usuario del sistema
    $user = Auth::user();

    // [2] actualiza la info de usuario
    $user->name  = $request->name;
    $user->email = $request->email;
    if(!empty($request->password)){
      $user->password = Hash::make($request->password);
    }

    $user->save();

    // [3] lo manda de nuevo al perfil
    return redirect("dashboard/yo");
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
