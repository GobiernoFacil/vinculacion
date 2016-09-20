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

// FormValidators

class AdminChambers extends Controller
{
  /*
   * C Á M A R A S   D E   C O M E R C I O
   * ----------------------------------------------------------------
   */

  public function view($id){

  }

  public function add(){

  }

  public function save(Request $request){

  }

  public function edit($id){
    $user    = Auth::user();
    $chamber = User::with("chamber")->find($id);

    return view("admin.chamber-update")->with([
      "user"    => $user,
      "chamber" => $chamber
    ]);
  }

  public function update(Request $request, $id){

  }

  public function delete($id){

  }
}
