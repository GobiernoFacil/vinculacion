<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\models\Company;
use App\models\ChamberCompany;

class ChamberCompanies extends Controller
{
  /*
   * E M P R E S A S
   * ----------------------------------------------------------------
   */

  public function view($id){
    $user          = Auth::user();
    $chamber       = $user->chamber;
    $company       = ChamberCompany::where('chamber_id',$chamber->id)->where('company_id',$id)->with('company')->firstOrCreate([]);
    return view("chambers.companies.company-view")->with([
      "user"  => $user,
      "element" => $company
    ]);
  }

  public function add(){
    $user    = Auth::user();
    return view("chambers.companies.company-add")->with([
      "user"  => $user,
    ]);
  }

  public function save(Request $request){
    $user     = Auth::user();
    $chamber  = $user->chamber;
    $company  = Company::firstOrCreate($request->only(['rfc', 'razon_social', 'nombre_comercial', 'address', 'zip', 'phone','email','giro_comercial','alcance','type','size']));
    $company->contact()->firstOrCreate(
      ["name"  => $request->cname,
        "email" => $request->cemail,
        "phone" => $request->cphone,
      ]);
    $chamberCompany = ChamberCompany::firstOrCreate(['chamber_id'=>$chamber->id,'company_id'=>$company->id]);
    return redirect("tablero-camara/empresa/ver/$company->id")->with("message",'Empresa creada correctamente');
  }

  public function edit($id){
    $user          = Auth::user();
    $chamber       = $user->chamber;
    $company       = ChamberCompany::where('chamber_id',$chamber->id)->where('company_id',$id)->with('company')->firstOrCreate([]);
    return view("chambers.companies.company-update")->with([
      "user"  => $user,
      "element" => $company
    ]);
  }

  public function update(Request $request, $id){
    $user        = Auth::user();
    $chamber     = $user->chamber;
    $element     = ChamberCompany::where('chamber_id',$chamber->id)->where('company_id',$id)->with('company')->firstOrCreate([]);
    $element->company->update($request->only(['rfc', 'razon_social', 'nombre_comercial', 'address', 'zip', 'phone','email','giro_comercial','alcance','type','size']));
    $element->company->contact->update(
      ["name"  => $request->cname,
        "email" => $request->cemail,
        "phone" => $request->cphone,
      ]);
  $id = $element->company->id;
  return redirect("tablero-camara/empresa/ver/$id")->with("message",'Empresa actualizada correctamente');
  }

  public function delete($id){
    $user        = Auth::user();
    $chamber     = $user->chamber;
    $element     = ChamberCompany::where('chamber_id',$chamber->id)->where('company_id',$id)->with('company')->firstOrCreate([]);
    $element->company->contact->delete();
    $element->company->delete();
    $element->delete();
    return redirect("tablero-camara/empresas")->with("message",'Empresa eliminada correctamente');
  }

  public function loadGroup(){

  }

  public function saveGroup(Request $request){

  }
}
