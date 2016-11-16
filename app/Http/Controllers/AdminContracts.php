<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\models\Contract;
use App\models\Opd;

use App\Http\Requests\OpdSaveContractsRequest;
use App\Http\Requests\AdminUpdateContractsRequest;
class AdminContracts extends Controller
{

  // el tamaño de la paginación
  public $pageSize = 10;
  /*
  * C O N T R A T O S
  * ----------------------------------------------------------------
  */

  public function index($id_opd){
    $user = Auth::user();
    $opd = Opd::find($id_opd);
    $contracts_num = $opd->contracts->count();
    $contracts     = $opd->contracts()->paginate($this->pageSize);

    return view("admin.contracts.list")->with([
      "user" => $user,
      "contracts"  =>$contracts,
      "opd_id"  =>$opd->id
    ]);


  }

  public function view($id_opd,$id_contract){
    $user    = Auth::user();
    $opd = Opd::find($id_opd);
    $contract = $opd->contracts->find($id_contract);
    return view("admin.contracts.contract-view")->with([
      "user"  => $user,
      "contract" => $contract,
      "opd"   =>$opd
    ]);
  }

  public function add($id){
    $user = Auth::user();
    $opds = Opd::all();
    return view("admin.contracts.contracts-add")->with([
      "user"  => $user,
      "opd_id" =>$id,
    ]);
  }

  public function save(OpdSaveContractsRequest $request){
    $user      = Auth::user();
    $opd       = Opd::find($request->id);
    $data      = $request->except('_token');
    $contract  = Contract::firstOrCreate($data);
    $contract->opd_id = $opd->id;
    $contract->save();
    return redirect("dashboard/contrato/ver/$opd->id/$contract->id");
  }

  public function edit($id_opd,$id_contract){
    $user     = Auth::user();
    $opd      = Opd::find($id_opd);
    $contract  = $opd->contracts->find($id_contract);
    return view("admin.contracts.contracts-update")->with([
      "user"  => $user,
      "contract" => $contract,
      "opd"    =>$opd
    ]);

  }

  public function update(AdminUpdateContractsRequest $request){
    $user        = Auth::user();
    $opd         = Opd::find($request->id);
    $contract     = $opd->contracts->find($request->id_contract);
    $data = $request->except('_token');
    $contract->update($data);
  return redirect("dashboard/contrato/ver/$request->id/$contract->id");
  }

  public function delete($id_opd,$id_contract){
    $opd = Opd::find($id_opd);
    $contract = $opd->contracts->find($id_contract);
    $contract->delete();
    return redirect("dashboard/contratos/$id_opd")->with('message','Convenio eliminado correctamente.');;
  }

  public function enable($id){

  }

  public function disable($id){

  }

  public function students($id, $page = 1){

  }
}
