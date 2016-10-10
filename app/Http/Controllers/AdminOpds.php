<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Hash;

// models
use App\User;

// FormValidators
use App\Http\Requests\UpdateOpdRequest;
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

  public function update(UpdateOpdRequest $request, $id){
    $user = User::find($id);
    $old_email = $user->email;

    // update user
    $user->name  = $request->name;
    $user->email = $request->email;
    if(!empty($request->password)){
      $user->password = Hash::make($request->password);
    }
    $user->save();

    // send email if distinct
    if($user->email != $old_email){
      $path = base_path();
      exec("php {$path}/artisan email:send new_email {$user->id} > /dev/null &");
    }

    // update opd
    $user->opd->update($request->only(['opd_name', 'state', 'city', 'address', 'zip', 'url']));

    // update opd
    $user->opd->contact->update([
      "name"  => $request->cname,
      "email" => $request->cemail,
      "phone" => $request->cphone,
    ]);

    // send to view
    return redirect("dashboard/opd/{$id}");
  }

  public function delete($id){

  }
}
