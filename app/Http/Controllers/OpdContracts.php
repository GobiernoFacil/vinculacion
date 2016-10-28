<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
 //models
use App\models\Contract;


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
    return view("opds.contracts.contracts-add")->with([
      "user"  => $user,
    ]);
  }

  public function save(OpdSaveContractsRequest $request){
    $user      = Auth::user();
    $opd       = $user->opd;
    $data      = $request->except('_token');
    $contract  = Contract::firstOrCreate($data);
    $contract->opd_id = $opd->id;
    $contract->save();
    return redirect("tablero-opd/convenio/ver/$contract->id")->with("message","Convenio agregado correctamente");

  }

  public function edit($id){
    $user     = Auth::user();
    $contract  = $user->opd->contracts->find($id);
    return view("opds.contracts.contracts-update")->with([
      "user"  => $user,
      "contract" => $contract,
    ]);

  }

  public function update(OpdUpdateContractsRequest $request, $id){
    $user        = Auth::user();
    $contract     = $user->opd->contracts->find($id);
    $data = $request->except('_token');
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
