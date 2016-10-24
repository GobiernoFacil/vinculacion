<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Hash;
use App\Http\Requests\UpdatePueblaProfileRequest;
class Puebla extends Controller
{
  /*
   * D A S H B O A R D
   * ----------------------------------------------------------------
   */
  public function index(){
	// [1] el usuario del sistema
    $user 		= Auth::user();
    $vacancies  = $user->vacancies()->count();
    return view("puebla.dashboard")->with([
      "user"      => $user,
      "vacancies" => $vacancies,
    ]);
  }

  /*
   * P E R F I L   D E   L A   S E C O T R A D E
   * ----------------------------------------------------------------
   */

   public function me(){
     $user = Auth::user();
     return view("puebla.me.me")->with([
       "user" => $user,
     ]);
   }

   public function changeMe(){
     $user = Auth::user();
     return view("puebla.me.me-update")->with([
       "user" => $user,
     ]);
   }

   public function updateMe(UpdatePueblaProfileRequest $request){
     $user = Auth::user();
     $user->name = $request->name;
     $user->email = $request->email;
     if(!empty($request->password)){
       $user->password = Hash::make($request->password);
     }
     $user->save();
     return redirect("tablero-secotrade/yo");
   }
}
