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
  	$opds = User::where("type", "opd")->with("opd")->get();
    return view("frontend.home")->with([
      "opds" => $opds
    ]);
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
    $opd = Opd::find($id);

    return view("frontend.opd-profile")->with([
      "opd"  => $opd
    ]);
  }

  public function companies(Request $request){
    //$query
    $companies = Company::orderBy('nombre_comercial', 'asc');
    if($request->input('query')){
      $companies = $companies->where('nombre_comercial', 'like', "%{$request->input('query')}%");
    }
    $companies = $companies->paginate($this->pageSize);

    // [3] regresa el view
    return view('frontend.company-list')->with([
      "companies" => $companies
    ]);
  }

  public function company($id){
    $company = Company::find($id);

    return view("frontend.company-profile")->with([
      "company"  => $company
    ]);
  }

  public function openData(){

  }

  public function privacy(){
    
  }
}
