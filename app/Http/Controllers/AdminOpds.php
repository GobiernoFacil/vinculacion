<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
// models
use App\User;
class AdminOpds extends Controller
{
  /*
   * O P D S
   * ----------------------------------------------------------------
   */

  public function view($id){
  	$user  = Auth::user();
    $opd = User::find($id);

    return view("admin.opds.opd-profile")->with([
      "user"  => $user,
      "opd" => $opd
    ]);
  }

  public function add(){

  }

  public function save(Request $request){

  }

  public function edit($id){
    // [1] el usuario del sistema
    $user = Auth::user();
    // [2] el usuario a editar
    $opd  = User::with("opd.contact")->find($id);
    // [3] el view para editar
    return view("admin.opd-update")->with([
      "user" => $user,
      "opd"  => $opd
    ]);
  }

  public function update(Request $request, $id){

  }

  public function delete($id){

  }
}
