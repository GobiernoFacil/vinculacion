<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\models\Company;
use App\models\Opd;
use App\models\Vacant;

class Front extends Controller
{

  // el tamaño de la paginación
  public $pageSize = 10;

  // La página de inicio
  //
  //
  public function index(){
    return view("frontend.home");
  }

  public function offers($page = 1){

  }

  public function offer($id){

  }

  // Las opds
  // **** EL EJEMPLO PARA LAS LISTAS DE USUARIOS ****
  //
  public function opds(Request $request){
    //$query
    $opds = Opd::orderBy('opd_name', 'asc');
    if($request->input('query')){
      $opds = $opds->where('opd_name', 'like', "%{$request->input('query')}%");
    }
    $opds = $opds->paginate($this->pageSize);

    // [3] regresa el view
    return view('frontend.opd-list')->with([
      "opds" => $opds
    ]);
  }

  public function opd($id){
    $opd = User::find($id);

    return view("frontend.opds.opd-profile")->with([
      "opd"  => $opd
    ]);
  }

  public function companies($page = 1){

  }

  public function company($id){

  }

  public function openData(){

  }

  public function privacy(){
    
  }
}
