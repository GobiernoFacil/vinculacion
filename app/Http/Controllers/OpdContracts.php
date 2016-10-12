<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
 //models
use App\models\Contract;


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

  public function save(Request $request){
    $user      = Auth::user();
    $opd       = $user->opd;
    $data      = $request->except('_token');
    $contract  = Contract::firstOrCreate($data);
    $contract->opd_id = $opd->id;
    $contract->save();
    return redirect("tablero-opd/convenio/ver/$contract->id");

  }

  public function edit($id){
    $user     = Auth::user();
    $contract  = $user->opd->contracts->find($id);
    return view("opds.contracts.contracts-update")->with([
      "user"  => $user,
      "contract" => $contract,
    ]);

  }

  public function update(Request $request, $id){
    $user        = Auth::user();
    $contract     = $user->opd->contracts->find($id);
    $data = $request->except('_token');
    $contract->update($data);
  return redirect("tablero-opd/convenio/ver/$contract->id");
  }

  public function delete($id){
    $contract = Auth::user()->opd->contracts->find($id);
    $contract->delete();
    return redirect("tablero-opd/convenios");
  }

  public function enable($id){

  }

  public function disable($id){

  }

  public function students($id, $page = 1){

  }
}
