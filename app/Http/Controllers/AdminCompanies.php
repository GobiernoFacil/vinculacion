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

  }

  public function delete($id){

  }
}
