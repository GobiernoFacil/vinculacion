<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

use App\models\Vacant;
use App\models\Applicant;
use App\models\Interview;
class StudentVacancies extends Controller
{
  public $pageSize = 10;
  /*
   * V A C A N T E S
   * ----------------------------------------------------------------
   */
  
  public function vacancies(Request $request){
    // [1] el usuario del sistema
    $user      = Auth::user();
    // [2] la empresa
    $student   = $user->student;
    // [3] las vacantes
    $vacancies = Vacant::where('status', 1)->paginate($this->pageSize);

    // [4] regresa el view
    return view('students.vacancies.vacancies')->with([
      "user"      => $user,
      "student"   => $student,
      "vacancies" => $vacancies
    ]);
  }
  
  public function vacanciesApplied(Request $request){
    // [1] el usuario del sistema
    $user      = Auth::user();
    // [2] la empresa
    $student   = $user->student;
    // [3] las vacantes
	$applications	= $student->applications()->get();
    // [4] regresa el view
    return view('students.vacancies.vacancies_applied')->with([
      "user"      => $user,
      "student"   => $student,
      "applications" => $applications
    ]);
  }

  public function vacancy($id){
    $user    = Auth::user();
    $student = $user->student;
    $vacancy = Vacant::find($id);
    $applied = $student->applications()->where('vacant_id', $id)->count();

    if($vacancy && $vacancy->status){
      return view("students.vacancies.vacancy")->with([
        "user"    => $user,
        "vacancy" => $vacancy,
        "student" => $student,
        "applied" => $applied
      ]);
    }
    else{
      return redirect('tablero-estudiante/vacantes');
    }
  }

  public function apply($id){
    $user    = Auth::user();
    $student = $user->student;
    $vacancy = Vacant::where('status', 1)->find($id);

    if($vacancy){
      $application = Applicant::firstOrCreate([
        "student_id" => $student->id,
        "vacant_id"  => $vacancy->id
      ]);

      return redirect("tablero-estudiante/vacante/{$vacancy->id}");
    }
    else{
      return redirect('tablero-estudiante/vacantes');
    }
  }

  public function decline($id){
    $user    = Auth::user();
    $student = $user->student;
    $vacancy = Vacant::where('status', 1)->find($id);
    Applicant::where("student_id", $student->id)->where("vacant_id", $id)->delete();
    return redirect("tablero-estudiante/vacante/{$vacancy->id}");
  }

  public function myVacancies($page = 1){

  }

  public function interviews(Request $request){
	$user    = Auth::user();
    $student = $user->student;
    $interviews = $student->interviews;
    
    return view('students.interviews.interviews')->with([
      "user"      => $user,
      "student"   => $student,
      "interviews" => $interviews
	]);  
   }

  public function interview($id){
  	$user    	= Auth::user();
    $student 	= $user->student;
    $interview  = Interview::where('id', $id)->where("student_id", $student->id)->get();
    
    return view('students.interviews.interview')->with([
      "user"      => $user,
      "student"   => $student,
      "interview" => $interview
	]);
    
  }
}