<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Artisan;

// models
use App\User;
use App\models\Company;

// FormValidators
use App\Http\Requests\AddCompaniesByFile;

class OpdCompanies extends Controller
{
  /*
   * E M P R E S A S
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
    return view("opds.companies.companies-add-xlsx")->with(["user" => $user]);
  }

  public function saveMultiple(AddCompaniesByFile $request){
    $user  = Auth::user();
    $path  = base_path();
    $_path = storage_path('app');
    $_file = str_random(16);
    $file  = $_path . '/' . $_file;
    $request->file('file')->move($_path, $_file);
// update:companies {user} {file}
    $code = Artisan::call('update:companies', [
      "user" => $user->id,
      "file" => $file
    ]);
    //exec("php {$path}/artisan update:companies {$user->id} '{$file}' > /dev/null &");

    return redirect("tablero-opd/empresas");
  }
}
