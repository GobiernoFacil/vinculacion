<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Hash;
// models
use App\User;
// FormValidators
use App\Http\Requests\saveSecotrade;
use App\Http\Requests\updateSecotrade;
class AdminSecotrade extends Controller
{
  // el tamaño de la paginación
  public $pageSize = 10;
    /**
     * Lista de usuarios secotrade
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // [1] el usuario del sistema
      $user   = Auth::user();

      // [2] todos los usuarios secotrade
      //     la guía de paginación está aquí:
      //     https://laravel.com/docs/5.2/pagination
      //
      //     en el view se muestra la paginación básica, aunque no está mal.
      $secotrade = User::where("type", "puebla")->paginate($this->pageSize);

      // [3] regresa el view
      return view('admin.puebla.puebla-list')->with([
        "user"   => $user,
        "secotrade" => $secotrade
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
      $user  = Auth::user();
      return view("admin.puebla.puebla-create")->with([
        "user"  => $user
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(saveSecotrade $request)
    {
      $secotrade           = new User();
      $secotrade->type     = "puebla";
      $secotrade->name     = $request->name;
      $secotrade->email    = $request->email;
      $secotrade->password = Hash::make($request->password);
      $secotrade->enabled  = 1;
      $secotrade->save();
      return redirect("dashboard/secotrade")->with('message','Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
      $user  = Auth::user();
      $person = User::find($id);

      return view("admin.puebla.puebla-profile")->with([
        "user"  => $user,
        "person" => $person
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user  = Auth::user();
      $person = User::find($id);

      return view("admin.puebla.puebla-update")->with([
        "user"  => $user,
        "person" => $person
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateSecotrade $request, $id)
    {
      $secotrade        = User::find($id);
      $secotrade->name  = $request->name;
      $secotrade->email = $request->email;

      if(!empty($request->password)){
        $secotrade->password = Hash::make($request->password);
      }
      $secotrade->save();

      return redirect("dashboard/secotrade/ver/$id")->with("message",'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $user         = Auth::user();
      if($user->id != $id){
        $secotrade        = User::find($id);
        $secotrade->delete();
      }
      return redirect("dashboard/secotrade")->with("message",'Usuario eliminado correctamente');
    }
}
