<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
 //models
use App\models\Contract;
use App\models\Company;

use App\Http\Requests\OpdSaveContractsRequest;
use App\Http\Requests\OpdUpdateContractsRequest;
class OpdContracts extends Controller
{
  /*
  * C O N T R A T O S
  * ----------------------------------------------------------------
  */

  public function view($id){
    $user    = Auth::user();
    $contract    = $user->opd->contracts->find($id);
    return view("opds.contracts.contract-view")->with([
      "user"  => $user,
      "contract" => $contract
    ]);
  }

  public function add(){
    $user    = Auth::user();
    $companies = Company::WhereNotNull('nombre_comercial')->where('creator_id',$user->opd->id)->pluck('nombre_comercial');
    $all     = Company::WhereNotNull('nombre_comercial')->where('creator_id',$user->opd->id)->pluck('id','nombre_comercial');
    return view("opds.contracts.contracts-add")->with([
      "user"  => $user,
      "companies"=>$companies,
      "all" =>$all
    ]);
  }

  public function save(OpdSaveContractsRequest $request){
    $user      = Auth::user();
    $opd       = $user->opd;
    $data      = $request->except(['_token','company']);
    $contract  = Contract::firstOrCreate($data);
    $contract->opd_id = $opd->id;
    $contract->contract_opd = $opd->opd_name;
    $contract->save();
    return redirect("tablero-opd/convenio/ver/$contract->id")->with("message","Convenio agregado correctamente");

  }

  public function edit($id){
    $user     = Auth::user();
    $contract  = $user->opd->contracts->find($id);
    $companies = Company::WhereNotNull('nombre_comercial')->where('creator_id',$user->opd->id)->pluck('nombre_comercial');
    $all     = Company::WhereNotNull('nombre_comercial')->where('creator_id',$user->opd->id)->pluck('id','nombre_comercial');
    return view("opds.contracts.contracts-update")->with([
      "user"  => $user,
      "contract" => $contract,
      "companies"=>$companies,
      "all" =>$all
    ]);

  }

  public function update(OpdUpdateContractsRequest $request, $id){
    $user        = Auth::user();
    $contract     = $user->opd->contracts->find($id);
    $data = $request->except(['_token','company']);
    $data['opd_id'] = $user->opd->id;
    $data['contract_opd'] = $user->opd->opd_name;
    $contract->update($data);
  return redirect("tablero-opd/convenio/ver/$contract->id")->with("message","Convenio actualizado correctamente");;
  }

  public function delete($id){
    $contract = Auth::user()->opd->contracts->find($id);
    $contract->delete();
    return redirect("tablero-opd/convenios")->with("message","Convenio eliminado correctamente");;
  }

  public function enable($id){

  }

  public function disable($id){

  }

  public function students($id){

  }
}
