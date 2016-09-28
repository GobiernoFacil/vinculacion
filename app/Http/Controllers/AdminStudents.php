<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
// models
use App\User;


class AdminStudents extends Controller
{
  /*
   * E S T U D I A N T E S
   * ----------------------------------------------------------------
   */

  public function view($id){
	$user  = Auth::user();
    $student = User::find($id);

    return view("admin.students.student-profile")->with([
      "user"  	=> $user,
      "student" => $student
    ]);

  }

  public function add(){

  }

  public function save(Request $request){

  }

  public function edit($id){

  }

  public function update(Request $request, $id){

  }

  public function delete($id){

  }
}
