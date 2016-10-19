<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class StudentCv extends Controller
{
  /*
   * CV
   * ----------------------------------------------------------------
   */
    public function view(){
      $user    = Auth::user();
      $cv = $user->student->cv()->firstOrCreate([]);
      return view("students.cv.cv-view")->with([
        "user"  => $user,
        "cv" => $cv
      ]);

    }


    public function edit(){
      $user    = Auth::user();
      $cv = $user->student->cv()->firstOrCreate([]);
      return view("students.cv.cv-update")->with([
        "user"  => $user,
        "cv" => $cv
      ]);

    }

    public function update(Request $request){
      $cv = Auth::user()->student->cv()->firstOrCreate([]);
      // update student
      $cv->update($request->except('_token'));
      return redirect("tablero-estudiante/cv");
    }
}
