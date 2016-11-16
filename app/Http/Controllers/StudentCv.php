<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

use App\models\Cv;
use App\models\Language;
use App\models\Software;
use App\models\AcademicTraining;

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
        "cv"    => $cv
      ]);

    }

    public function update(Request $request){
      $cv = Auth::user()->student->cv()->firstOrCreate([]);
      // update student
      $cv->update($request->except('_token'));
      return redirect("tablero-estudiante/cv")->with("message",'CV actualizado correctamente');
    }

    public function addLanguage(Request $request){
      $user = Auth::user();
      $cv   = $user->student->cv;
      $language = $cv->languages()->firstOrCreate([
        'name'  => $request->name,
        'level' => $request->level
      ]);

      return response()->json($language);
    }

    public function removeLanguage($id){
      $user = Auth::user();
      $lang = $user->student->cv->languages()->find($id);
      $r    = $lang->delete();

      return response()->json($r);
    }

    public function addSoftware(Request $request){
      $user     = Auth::user();
      $cv       = $user->student->cv;
      $software = $cv->softwares()->firstOrCreate([
        'name'  => $request->name,
        'level' => $request->level
      ]);

      return response()->json($software);
    }

    public function removeSoftware($id){
      $user     = Auth::user();
      $software = $user->student->cv->softwares()->find($id);
      $r        = $software->delete();

      return response()->json($r);
    }

    public function addExperience(Request $request){
      $user     = Auth::user();
      $cv       = $user->student->cv;
      $experience = $cv->experiences()->firstOrCreate([
        'name'  => $request->name,
        'company' => $request->company,
        'sector' => $request->sector,
        'from' => $request->from,
        'to' => $request->to,
        'city' => $request->city,
        'state' => $request->state,
        'description' => $request->description

      ]);

      return response()->json($experience);
    }

    public function removeExperience($id){
      $user     = Auth::user();
      $experience = $user->student->cv->experiences()->find($id);
      $r        = $experience->delete();

      return response()->json($r);
    }
}
