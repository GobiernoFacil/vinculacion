<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

use App\models\Vacant;
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
    //User::where("type", "opd")->with("opd")->paginate($this->pageSize);

    // [4] regresa el view
    return view('companies.vacancies')->with([
      "user"      => $user,
      "student"   => $student,
      "vacancies" => $vacancies
    ]);
  }

  public function vacancy(){

  }

  public function apply($id){
  }

  public function myVacancies($page = 1){

  }
}