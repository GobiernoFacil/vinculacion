<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
// models
use App\User;

class AdminCompanies extends Controller
{
  /*
  * E M P R E S A S
  * ----------------------------------------------------------------
  */

  public function view($id){
    $user    = Auth::user();
    $company = User::find($id);

    return view("admin.companies.company-profile")->with([
      "user"  => $user,
      "company" => $company
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
    $company  = User::with("company.contact")->find($id);
    // [3] el view para editar
    return view("admin.companies.company-update")->with([
      "user" => $user,
      "company"  => $company
    ]);

  }

  public function update(Request $request, $id){
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

    // update company
    $user->company->update($request->only(['rfc', 'razon_social', 'nombre_comercial', 'address', 'zip', 'phone','email','giro_comercial','alcance','type','size']));

    // update company contact
    $user->company->contact->update([
      "name"  => $request->cname,
      "email" => $request->cemail,
      "phone" => $request->cphone,
    ]);

    // send to view
    return redirect("dashboard/empresa/{$id}");

  }

  public function delete($id){

  }
}
