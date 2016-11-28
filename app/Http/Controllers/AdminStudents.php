<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
// models
use App\User;
use App\models\Student;
use App\models\Opd;


class AdminStudents extends Controller
{
  /*
   * E S T U D I A N T E S
   * ----------------------------------------------------------------
   */

  public function view($id){
	$user  = Auth::user();
  $student = Student::find($id);

    return view("admin.students.student-profile")->with([
      "user"  	=> $user,
      "student" => $student
    ]);

  }

  public function add(){
    $user  = Auth::user();
    $opds  = Opd::all()->pluck('opd_name','id');
  //  $offer =  
    return view("admin.students.students-add")->with([
      "user"  => $user,
      "opds"  =>$opds,
    ]);
  }

  public function save(Request $request){
    $data    = $request->except('_token');
    $student = Student::firstOrCreate($data);
    $student->nombre_completo = $data['nombre']." ".$data['apellido_paterno']." ".$data['apellido_materno'];
    $student->save();
    return redirect("dashboard/estudiante/$student->id")->with("message", 'Estudiante creado correctamente');
  }

  public function edit($id){
    $user    = Auth::user();
    $student = Student::with('user.opd')->find($id);
    $opds    = Opd::all()->pluck('opd_name','id');
    return view("admin.students.students-update")->with([
      "user"  => $user,
      "student" => $student,
      "opds"   =>$opds
    ]);
  }

  public function update(Request $request, $id){
    $student = Student::find($id);
    // update student
    $student->update($request->only(['nombre', 'apellido_paterno', 'apellido_materno', 'curp', 'matricula', 'carrera','status','opd_id']));
    $student->nombre_completo = $request->nombre." ".$request->apellido_paterno." ".$request->apellido_materno;
    $student->save();
    return redirect("dashboard/estudiante/$student->id")->with("message", 'Estudiante actualizado correctamente');
  }

  public function delete($id){
    $student = Student::find($id);
    $student->delete();
    return redirect('dashboard/estudiantes')->with("message", 'Estudiante eliminado correctamente');;
  }
}
