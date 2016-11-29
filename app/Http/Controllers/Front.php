<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\models\Company;
use App\models\Opd;
use App\models\OpenData;
use App\models\Vacant;
use App\models\AcademicOffer;

class Front extends Controller
{

  // el tamaño de la paginación
  public $pageSize = 10;

  // La página de inicio
  //
  //
  public function index(){
  	$vacancies_count = Vacant::where('status', 1)->count();
  	$offer_count	 = AcademicOffer::all()->count();
  	$companies		 = User::where(["type"=>"company", "enabled" =>1])->with("company")->take(4)->get();
  	$opds 			 = User::where("type", "opd")->with("opd")->orderBy('name', 'asc')->get();

    return view("frontend.home")->with([
      "opds" 			=> $opds,
      "vacancies_count"	=> $vacancies_count,
      "companies"		=> $companies,
      "offer_count"		=> $offer_count
    ]);
  }

  public function offers($page = 1){
    $vacancies = Vacant::where('status', 1)->orderBy('updated_at', 'desc')->paginate($this->pageSize);
    return view('frontend.vacancies-list')->with([
      "vacancies" => $vacancies
    ]);
  }

  public function offer($id){
    $vacancy = Vacant::find($id);
    if($vacancy && $vacancy->status){
      return view("frontend.vacancy-info")->with([
        "vacancy" => $vacancy,
      ]);
    }
    else{
      return redirect('oferta-laboral');
    }
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
    $opd 	= Opd::find($id);
    $offers = AcademicOffer::where('opd_id', $id)->orderBy("academic_name", "asc")->get();
    $offers_tags = AcademicOffer::where('opd_id', $id)->pluck('academic_name')->toArray();
    $vacancies = [];
    foreach ($offers_tags as $tag) {
    $vacants = Vacant::where('tags', 'like','%'.$tag.'%')->orderBy("created_at", "desc")->get();
    //Se limita a 7 vacantes para desplegar en perfil de universidades
      if($vacants->count() > 0 && sizeof($vacancies) < 7){
        foreach ($vacants as $vacant) {
          if(sizeof($vacancies) < 7){
            $vacancies[]=$vacant;
          }else{
            break;
          }
        }
      }
    }
   return view("frontend.opd-profile")->with([
      "opd"  	=> $opd,
      "offers"	=> $offers,
      "vacancies" => $vacancies
    ]);
  }

  ///// companies list
  public function companies(Request $request){
    //$query
    $companies = User::where(["type"=>"company", "enabled" =>1])->with("company")->orderBy('id', 'asc');

    if($request->input('query')){
      $companies = $companies->where('nombre_comercial', 'like', "%{$request->input('query')}%");
    }
    $companies = $companies->paginate($this->pageSize);

    // [3] regresa el view
    return view('frontend.companies-list')->with([
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
    $opendata = OpenData::all();
    return view("frontend.open-data")->with(["openData" => $opendata]);
  }

  public function privacy(){
    return view('frontend.privacy');
  }
}
