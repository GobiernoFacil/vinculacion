<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\models\Contract;
use App\models\Opd;
use App\models\Company;

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
    $user 			= Auth::user();
    $opd 			= Opd::find($id_opd);
    $contracts_num  = $opd->contracts->count();
    $contracts      = $opd->contracts()->paginate($this->pageSize);

    return view("admin.contracts.contracts-list-opd")->with([
      "user" 		=> $user,
      "contracts"   =>$contracts,
      "opd"  	    =>$opd
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
    $companies = Company::WhereNotNull('nombre_comercial')->pluck('nombre_comercial');
    $all     = Company::WhereNotNull('nombre_comercial')->pluck('id','nombre_comercial');
    return view("admin.contracts.contracts-add")->with([
      "user"  => $user,
      "opd_id" =>$id,
      "companies"=>$companies,
      "all" =>$all
    ]);
  }

  public function save(OpdSaveContractsRequest $request){
    $user      = Auth::user();
    $opd       = Opd::find($request->id);
    $data      = $request->except(['_token','company']);
    $contract  = Contract::firstOrCreate($data);
    $contract->opd_id = $opd->id;
    $contract->contract_opd = $opd->opd_name;
    $contract->save();
    return redirect("dashboard/convenio/ver/$opd->id/$contract->id");
  }

  public function edit($id_opd,$id_contract){
    $user     = Auth::user();
    $opd      = Opd::find($id_opd);
    $contract  = $opd->contracts->find($id_contract);
    $companies = Company::WhereNotNull('nombre_comercial')->pluck('nombre_comercial');
    $all     = Company::WhereNotNull('nombre_comercial')->pluck('id','nombre_comercial');
    return view("admin.contracts.contracts-update")->with([
      "user"  => $user,
      "contract" => $contract,
      "opd"    =>$opd,
      "companies"=>$companies,
      "all" =>$all
    ]);

  }

  public function update(AdminUpdateContractsRequest $request){
    $user        = Auth::user();
    $opd         = Opd::find($request->id);
    $contract     = $opd->contracts->find($request->id_contract);
    $data = $request->except(['_token','company']);
    $data['opd_id'] = $user->opd->id;
    $data['contract_opd'] = $user->opd->opd_name;
    $contract->update($data);
  return redirect("dashboard/convenio/ver/$request->id/$contract->id");
  }

  public function delete($id_opd,$id_contract){
    $opd = Opd::find($id_opd);
    $contract = $opd->contracts->find($id_contract);
    $contract->delete();
    return redirect("dashboard/convenios/$id_opd")->with('message','Convenio eliminado correctamente.');;
  }

  public function enable($id){

  }

  public function disable($id){

  }

  public function students($id, $page = 1){

  }
}
