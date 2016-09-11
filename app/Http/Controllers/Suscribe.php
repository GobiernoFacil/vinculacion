<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use Hash;
use Validator;
class Suscribe extends Controller
{

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validatorUser(array $data){
      return Validator::make($data, [
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6|confirmed',
          'password_confirmation' => 'required|min:6|same:password',
          'conditions' =>'required',
          'type' =>'required'
      ],
      $messages=['conditions.required'=>'Debes aceptar las condiciones de privacidad',
                 'type.required'=>'Debes seleccionar un tipo de empresa']);
  }


  // muestra el formulario de registro
  //
  //
  public function index(){

  }

  // registra al usuario, le el objeto que lo define, y lo lleva por primera vez
  // al dashboard
  //
  public function suscribe(Request $request){
     $validator = $this->validatorUser($request->toArray());
     if($validator->fails()){
       return redirect('registro')->withErrors($validator)->withInput();
     }

      $user = new User([
        'name'     => 'no name',
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'type'     => $request->type,
      ]);
      $user->save();
      Auth::login($user);
      if($user->type ==='admin'){
          return redirect('dashboard');
      }else if($user->type==='opd'){
          return redirect('tablero-opd');
      }else if($user->type==='chamber'){
          return redirect('tablero-camara');
      }else if($user->type==='company'){
          return redirect('tablero-empresa');
      }else if($user->type==='student'){
          return redirect('tablero-estudiante');
      }

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
