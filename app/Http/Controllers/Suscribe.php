<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\models\Student;
use Auth;
use Hash;
use Validator;
use App\Http\Requests\SuscribePostRequest;
class Suscribe extends Controller
{
  // muestra el formulario de registro
  //
  //
  public function index(){
    return view('auth.register');
  }

  // registra al usuario, le el objeto que lo define, y lo lleva por primera vez
  // al dashboard
  //
  public function suscribe(SuscribePostRequest $request){
    // la validación de esta maroma la pasé a:
    // app/http/requests/SuscribePostRequest
    // la documentación para usar este tipo de validación, está en:
    // https://laravel.com/docs/5.2/validation#form-request-validation

    // [1] crea el usuario
    $user = new User([
      'name'     => '(ಠ_ಠ) mi nombre es...',
      'email'    => $request->email,
      'password' => Hash::make($request->password),
      'type'     => $request->type,
    ]);

    $user->save();

    // [2] envía el correo de suscripción
    $path = base_path();
    exec("php {$path}/artisan email:send suscribe {$user->id} > /dev/null &");

    // [3] se crea el objeto empresa o el objeto estudiante
    if($user->type == "student"){
      $student = Student::where("opd_id", $request->opd)->where("matricula", $request->control)->first();
      $student->user_id = $user->id;
      $student->update();

      $name = empty($student->nombre_completo) ? "{$student->nombre} {$student->apellido_paterno} {$student->apellido_materno}" : $student->nombre_completo;
      $user->name = $name;
      $user->update();
    }
    else{
      $student = $user->company()->firstOrCreate([]);
    }

    // [4] autoriza al usuario y lo redirecciona a su dashboard
    Auth::login($user);
    return redirect('guide-me');


    //$this->redirectToDashboard($user);
  }

  // después de acceder, un usuario es redireccionado aquí, para que se le lleve al
  // dashboard que le corresponde
  //
  public function redirectToDashboard(){
    $u = Auth::user();

    if($u->type ==='superAdmin'){
      return redirect('dashboard');
    }elseif($u->type ==='admin'){
      return redirect('dashboard');
    }elseif($u->type==='opd'){
      return redirect('tablero-opd');
    }elseif($u->type==='chamber'){
      return redirect('tablero-camara');
    }elseif($u->type==='company'){
      return redirect('tablero-empresa');
    }elseif($u->type==='student'){
      return redirect('tablero-estudiante');
    }elseif($u->type==='puebla'){
      return redirect('tablero-secotrade');
    }else{
      abort(403, 'Unauthorized action.');
    }
  }

  // se elimina al usuario
  //
  //
  public function unsuscribe($id){

  }
}
