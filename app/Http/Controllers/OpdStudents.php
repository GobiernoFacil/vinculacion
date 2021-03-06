<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Artisan;

// models
use App\User;
use App\models\Student;
use App\models\AcademicOffer;

// FormValidators
use App\Http\Requests\AddStudentsByFile;
use App\Http\Requests\OpdSaveStudentRequest;
use App\Http\Requests\OpdUpdateStudentRequest;
class OpdStudents extends Controller
{
  /*
   * E S T U D I A N T E S
   * ----------------------------------------------------------------
   */

  public function view($id){
    $user    = Auth::user();
    $student = $user->opd->students->find($id);

    return view("opds.students.students-view")->with([
      "user"  => $user,
      "student" => $student
    ]);

  }

  public function add(){
    $user   = Auth::user();
    $opd    = $user->opd;
    $_offer = AcademicOffer::select("academic_name")
              ->where("opd", $opd->opd_name)
              ->orderBy("academic_name", "asc")->get();
    $offer  = [];

    foreach($_offer as $of){
      $offer[$of->academic_name] = $of->academic_name;
    } 

    return view("opds.students.students-add")->with([
      "user"  => $user,
      "offer" => $offer
    ]);

  }

  public function save(OpdSaveStudentRequest $request){
      $user    = Auth::user();
      $opd     = $user->opd;
      $data    = $request->except('_token');
      $student = Student::firstOrCreate(["matricula" => $request->matricula]);
      $student->update($data);
      $student->nombre_completo = $data['nombre']." ".$data['apellido_paterno']." ".$data['apellido_materno'];
      $student->opd_id     = $opd->id;
      $student->creator_id = $opd->id;
      $student->update();
      return redirect("tablero-opd/estudiante/ver/{$student->id}")->with("message", 'Estudiante creado correctamente');
  }

  public function edit($id){
    $user    = Auth::user();
    $student = $user->opd->students->find($id);
    $opd     = $student->opd;
    $_offer  = AcademicOffer::select("academic_name")
              ->where("opd", $opd->opd_name)
              ->orderBy("academic_name", "asc")->get();
    $offer   = [];

    foreach($_offer as $of){
      $offer[$of->academic_name] = $of->academic_name;
    } 
    
    return view("opds.students.students-update")->with([
      "user"  => $user,
      "student" => $student,
      "offer" => $offer
    ]);

  }

  public function update(OpdUpdateStudentRequest $request, $id){
    $student = Auth::user()->opd->students->find($id);
    // update student
    $student->update($request->only(['nombre', 'apellido_paterno', 'apellido_materno', 'curp', 'matricula', 'carrera','status']));
    $student->nombre_completo = $request->nombre." ".$request->apellido_paterno." ".$request->apellido_materno;
    $student->save();
    return redirect("tablero-opd/estudiante/ver/$student->id")->with("message", 'Estudiante actualizado correctamente');
  }

  public function delete($id){
    $student = Auth::user()->opd->students->find($id);
    $student->delete();
    return redirect('tablero-opd/estudiantes')->with("message", 'Estudiante eliminado correctamente');
  }

  public function enableToggle($id){
    $user = Auth::user();
    $student = $user->opd->students()->where('id', $id)->has('user')->first();

    if($student){
      $student->user->enabled = !$student->user->enabled;
      $student->user->update();
    }

    return redirect('tablero-opd/estudiantes/usuarios');

  }

  public function addMultiple(){
    $user = Auth::user();
    return view("opds.students.students-add-xlsx")->with(["user" => $user]);
  }

  public function saveMultiple(AddStudentsByFile $request){
    $user  = Auth::user();
    $path  = base_path();
    $_path = storage_path('app');
    $_file = str_random(16);
    $file  = $_path . '/' . $_file;
    $request->file('file')->move($_path, $_file);

    exec("php {$path}/artisan update:students {$user->id} '{$file}' > /dev/null &");


    return redirect("tablero-opd/estudiantes")->with("message",'Estudiantes creados correctamente');;
  }
}
