<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Suscribe extends Controller
{
  // muestra el formulario de registro
  //
  //
  public function index(){

  }

  // registra al usuario, le el objeto que lo define, y lo lleva por primera vez
  // al dashboard
  //
  public function suscribe(Request $request){

  }

  // después de acceder, un usuario es redireccionado aquí, para que se le lleve al
  // dashboard que le corresponde
  //
  public function redirectToDashboard(){

  }

  // se elimina al usuario
  //
  //
  public function unsuscribe($id){

  }
}
