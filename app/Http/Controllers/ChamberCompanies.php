<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use File;
use Artisan;
use App\models\Company;
use App\models\ChamberCompany;
use App\Http\Requests\AddChamberCompaniesByFile;
class ChamberCompanies extends Controller
{

    // En esta carpeta se guardan las imágenes de los logos
    const UPLOADS = "img/logos";
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
    //logo
    $path  = public_path(self::UPLOADS);
    // [ SAVE THE IMAGE ]
    if($request->hasFile('logo') && $request->file('logo')->isValid()){
      $name = uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
      $request->file('logo')->move($path, $name);
      $company->logo = $name;
      $company->save();
    }

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
    //logo
    $path  = public_path(self::UPLOADS);
    // [ SAVE THE IMAGE ]
    if($request->hasFile('logo') && $request->file('logo')->isValid()){
      //[erase image]
      if($element->company->logo){
        File::delete(self::UPLOADS.'/'.$element->company->logo);
      }
      $name = uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
      $request->file('logo')->move($path, $name);
      $element->company->logo = $name;
      $element->company->save();
    }
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
    $user = Auth::user();
    return view("chambers.companies.companies-add-xlsx")->with(["user" => $user]);
  }

  public function saveGroup(AddChamberCompaniesByFile $request){
    $user  = Auth::user();
    $path  = base_path();
    $_path = storage_path('app');
    $_file = str_random(16);
    $file  = $_path . '/' . $_file;
    $request->file('file')->move($_path, $_file);

    $code = Artisan::call('update:chamberCompanies', [
      "user" => $user->id,
      "file" => $file
    ]);
    return redirect("tablero-camara/empresas")->with("message",'Empresas creadas correctamente');
  }
}
