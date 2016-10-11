<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Artisan;

// models
use App\User;
use App\models\Student;

// FormValidators
use App\Http\Requests\AddStudentsByFile;

class OpdStudents extends Controller
{
  /*
   * E S T U D I A N T E S
   * ----------------------------------------------------------------
   */

  public function view($id){
    $user    = Auth::user();
    $student = Student::find($id);
    return view("opds.students.students-view")->with([
      "user"  => $user,
      "student" => $student
    ]);

  }

  public function add(){
    $user    = Auth::user();
    return view("opds.students.students-add")->with([
      "user"  => $user,
    ]);

  }

  public function save(Request $request){
      $user    = Auth::user();
      $opd     = $user->opd;
      $data    = $request->except('_token');
      $student = new Student($data);
      $student->nombre_completo = $data['nombre']." ".$data['apellido_paterno']." ".$data['apellido_materno'];
      $student->opd_id = $opd->id;
      $student->creator_id = $user->id;
      $student->save();
      return redirect("tablero-opd/estudiante/ver/$student->id");
  }

  public function edit($id){
    $user    = Auth::user();
    $student = Student::find($id);
    return view("opds.students.students-update")->with([
      "user"  => $user,
      "student" => $student
    ]);

  }

  public function update(Request $request, $id){
    $student = Student::find($id);
    // update student
    $student->update($request->only(['nombre', 'apellido_paterno', 'apellido_materno', 'curp', 'matricula', 'carrera','status']));
    $student->nombre_completo = $request->nombre." ".$request->apellido_paterno." ".$request->apellido_materno;
    $student->save();
    return redirect("tablero-opd/estudiante/ver/$student->id");
  }

  public function delete($id){
    $student  = Student::find($id);
    $student->delete();
    return redirect('tablero-opd/estudiantes');
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

    return redirect("tablero-opd/estudiantes");
  }
}
