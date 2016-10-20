<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Hash;
use App\Http\Requests\UpdateStudentProfileRequest;
class Students extends Controller
{
  /*
  * D A S H B O A R D
  * ----------------------------------------------------------------
  */
  public function index(){
    // [1] el usuario del sistema
    $user = Auth::user();

    // [2] contamos cuántos de cada uno
    $student   = $user->student;
    $vacancies = $student->applications()->count();
    $interviews = $student->interviews->count();

    // [3] regresa el view
    return view('students.dashboard')->with([
      "user"      => $user,
      // students
      "vacancies"  => $vacancies,
      'interviews' => $interviews
    ]);
  }

  /*
  * P E R F I L   D E L   E S T U D I A N T E
  * ----------------------------------------------------------------
  */

  public function me(){
    $user = Auth::user();
    $student = $user->student;
    return view("students.me.me")->with([
      "user" => $user,
      "student"  =>$student
    ]);
  }

  public function changeMe(){
    $user = Auth::user();
    return view("students.me.me-update")->with([
      "user" => $user,
    ]);
  }

  public function updateMe(UpdateStudentProfileRequest $request){
    $user = Auth::user();
    $user->name = $request->name;
    $user->email = $request->email;
    if(!empty($request->password)){
      $user->password = Hash::make($request->password);
    }
    $user->save();
    return redirect("tablero-estudiante/yo");
  }

  public function validateMe(){
  }

  /*
  * C V
  * ----------------------------------------------------------------
  */
  public function viewCV($id){

  }

  public function editCV($id){

  }

  public function updateCV(Request $request, $id){

  }
}
