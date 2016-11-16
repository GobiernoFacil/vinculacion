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
use File;
// FormValidators
use App\Http\Requests\UpdateChamberRequest;
use App\Http\Requests\SaveChamberRequest;

class AdminChambers extends Controller
{
  // En esta carpeta se guardan las imágenes de los logos
  const UPLOADS = "img/logos";
  /*
   * C Á M A R A S   D E   C O M E R C I O
   * ----------------------------------------------------------------
   */

  public function view($id){
    // [1] el usuario del sistema
    $user    = Auth::user();
    // [2] el usuario a editar
    $chamber = User::find($id);
    // [3] el view del perfil
    return view("admin.chambers.chamber-profile")->with([
      "user"    => $user,
      "chamber" => $chamber
    ]);
  }

  public function add(){
    // [1] el usuario del sistema
    $user = Auth::user();
    // [3] el formulario de crear cámara
    return view("admin.chambers.chamber-create")->with([
      "user" => $user
    ]);
  }

  public function save(SaveChamberRequest $request){
    // [1] se genera el nuevo usuario para la cámara
    $new_user = new User();
    $new_user->name     = $request->name;
    $new_user->email    = $request->email;
    $new_user->password = Hash::make($request->password);
    $new_user->type     = "chamber";
    $new_user->save();

    $chm = $new_user->chamber()->firstOrCreate($request->except(['_token', 'name', 'email', 'password','logo']));
    $path  = public_path(self::UPLOADS);
    // [ SAVE THE IMAGE ]
    if($request->hasFile('logo') && $request->file('logo')->isValid()){
      $name = uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
      $request->file('logo')->move($path, $name);
      $chm->chamber_logo = $name;
      $chm->save();
    }


    return redirect("dashboard/camaras");
  }

  public function edit($id){
    // [1] el usuario del sistema
    $user    = Auth::user();
    // [2] el usuario a editar
    $chamber = User::with("chamber")->find($id);
    // [3] el view para editar
    return view("admin.chambers.chamber-update")->with([
      "user"    => $user,
      "chamber" => $chamber
    ]);
  }

  public function update(UpdateChamberRequest $request, $id){
    // [1] el usuario a editar
    $chamber = User::find($id);

    // [2] actualiza la info de usuario
    $chamber->name  = $request->name;
    $chamber->email = $request->email;
    if(!empty($request->password)){
      $chamber->password = Hash::make($request->password);
    }
    $chamber->save();

    // [3] actualiza la información de la cámara
    //     La información que se guarda depende de los campos
    //     del array $fillable en el modelo de Chamber
    $chamber->chamber->update($request->all());
    //logo
    $path  = public_path(self::UPLOADS);
    // [ SAVE THE IMAGE ]
    if($request->hasFile('logo') && $request->file('logo')->isValid()){
      //[erase image]
      if($chamber->chamber->chamber_logo){
        File::delete(self::UPLOADS.'/'.$chamber->chamber->chamber_logo);
      }
      $name = uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
      $request->file('logo')->move($path, $name);
      $chamber->chamber->chamber_logo = $name;
      $chamber->chamber->save();
    }
    // [4] redirecciona a la lista de cámaras
    return redirect("dashboard/camaras");
  }

  public function delete($id){
    // [1] el usuario a eliminar
    $user = User::find($id);
    // [2] se elimina el usuario
    $user->chamber()->delete();
    $user->delete();

    // [4] redirecciona a la lista de cámaras
    return redirect("dashboard/camaras");
  }

  public function toggle($id){
    // [1] el usuario a eliminar
    $user = User::find($id);
    // [2] se elimina el usuario
    $user->enabled = ! $user->enabled;
    $user->update();

    // [4] redirecciona a la lista de cámaras
    return redirect("dashboard/camaras");
  }
}
