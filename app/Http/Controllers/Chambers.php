<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Http\Requests\UpdateChamberProfileRequest;
class Chambers extends Controller
{
  /*
  * D A S H B O A R D
  * ----------------------------------------------------------------
  */
  public function index(){
    return view("elcoruco-test")->with(["message" => "estás en el dashboard de cámaras!"]);
  }

  /*
  * P E R F I L   D E   L A   C Á M A R A
  * ----------------------------------------------------------------
  */

  public function me(){
    $user = Auth::user();
    $chamber = $user->chamber;
    return view("chambers.me.me")->with([
      "user" => $user,
      "chamber"  =>$chamber
    ]);
  }

  public function changeMe(){
    $user = Auth::user();
    $chamber = $user->chamber->with('contact')->firstOrCreate([]);
    return view("chambers.me.me-update")->with([
      "user" => $user,
      "chamber" => $chamber
    ]);
  }

  public function updateMe(UpdateChamberProfileRequest $request){
    $user = Auth::user();
    $chamber = $user->chamber;
    // update company
    $chamber->update($request->only(['chamber_rfc', 'chamber_comercial_name', 'chamber_street', 'chamber_zip','chamber_web','chamber_city','chamber_state']));
    if(!$chamber->contact){
      $chamber = $chamber->contact()->firstOrCreate([]);
      // update company contact
      $chamber->contact->update([
        "name"  => $request->cname,
        "email" => $request->cemail,
        "phone" => $request->cphone,
      ]);
    }else{
      // update company contact
      $chamber->contact->update([
        "name"  => $request->cname,
        "email" => $request->cemail,
        "phone" => $request->cphone,
      ]);
    }
    return redirect("tablero-camara/yo");
  }
}
