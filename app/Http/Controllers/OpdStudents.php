<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Artisan;

// models
use App\User;

// FormValidators
use App\Http\Requests\AddStudentsByFile;

class OpdStudents extends Controller
{
  /*
   * E S T U D I A N T E S
   * ----------------------------------------------------------------
   */

  public function view($id){

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

  public function addMultiple(){
    $user = Auth::user();
    return view("opds.students-add-xlsx")->with(["user" => $user]);
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
