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
    $user    = Auth::user();
    $company     = $user->opd->companies->find($id);
    return view("opds.companies.company-view")->with([
      "user"  => $user,
      "company" => $company
    ]);
  }

  public function add(){
    $user    = Auth::user();
    return view("opds.companies.company-add")->with([
      "user"  => $user,
    ]);

  }

  public function save(Request $request){
    $user     = Auth::user();
    $company  = Company::firstOrCreate($request->only(['rfc', 'razon_social', 'nombre_comercial', 'address', 'zip', 'phone','email','giro_comercial','alcance','type','size']));
    $company->creator_id = $user->opd->id;
    $company->save();
    $company->contact()->firstOrCreate(
      ["name"  => $request->cname,
        "email" => $request->cemail,
        "phone" => $request->cphone,
      ]);
      return redirect("tablero-opd/empresa/ver/$company->id");
  }

  public function edit($id){
    $user     = Auth::user();
    $company  = $user->opd->companies()->with('contact')->find($id);
    return view("opds.companies.company-update")->with([
      "user"  => $user,
      "company" => $company,
    ]);

  }

  public function update(Request $request, $id){
    $user        = Auth::user();
    $company     = $user->opd->companies->find($id);
    $company->update($request->only(['rfc', 'razon_social', 'nombre_comercial', 'address', 'zip', 'phone','email','giro_comercial','alcance','type','size']));
    $company->contact->update(
      ["name"  => $request->cname,
        "email" => $request->cemail,
        "phone" => $request->cphone,
      ]);
  return redirect("tablero-opd/empresa/ver/$company->id");
  }

  public function delete($id){
    $company = Auth::user()->opd->companies->find($id);
    $company->contact->delete();
    $company->delete();
    return redirect("tablero-opd/empresas");
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
