<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Artisan;

// models
use App\models\AcademicOffer;
use App\models\Opd;

class AdminAcademicOffer extends Controller
{
  // el tamaño de la paginación
  public $pageSize = 10;

  /*
   * O F E R T A   A C A D É M I C A
   * ----------------------------------------------------------------
   */

  public function all(){
    // [1] el usuario del sistema
    $user   = Auth::user();
    
    // [2] la oferta académica
    $offers = AcademicOffer::paginate($this->pageSize);

    // [3] regresa el view
    return view('admin.academic_offer.list')->with([
      "user"   => $user,
      "offers" => $offers
    ]);
  }

  public function view($id){
    $user  = Auth::user();
    $offer = AcademicOffer::find($id);
    
    return view("admin.academic_offer.view")->with([
      "user"  => $user,
      "offer" => $offer
    ]);

  }

  public function add(){
    $user    = Auth::user();
    $_opds    = Opd::select("id", "opd_name")->get();
    $opds = [];
    foreach($_opds as $opd){
      $opds[$opd->id] = $opd->opd_name;
    }
    return view("admin.academic_offer.add")->with([
      "user" => $user,
      "opds" => $opds
    ]);

  }

  public function save(Request $request){
      $user  = Auth::user();
      $id    = $request->opd;
      $opd   = Opd::find($id);
      $offer = AcademicOffer::firstOrCreate([
                "academic_name" => $request->academic_name,
                "opd"           => $opd->opd_name,
                "city"          => $opd->city,
               ]);

      return redirect("dashboard/oferta-academica/$offer->id");
  }

  public function edit($id){
    $user  = Auth::user();
    $offer = AcademicOffer::find($id);
    $_opds    = Opd::select("id", "opd_name")->get();
    $opds = [];
    foreach($_opds as $opd){
      $opds[$opd->id] = $opd->opd_name;
    }
    return view("admin.academic_offer.update")->with([
      "user"  => $user,
      "offer" => $offer,
      "opds"  => $opds
    ]);

  }

  public function update(Request $request, $id){
    $offer = AcademicOffer::find($id);
    $opd   = Opd::find($request->opd);
    // update offer
    $offer->update([
      "academic_name" => $request->academic_name,
      "opd"           => $opd->opd_name,
      "city"          => $opd->city,
    ]);

    return redirect("dashboard/oferta-academica/$offer->id");
  }

  public function delete($id){
    $offer = AcademicOffer::find($id);
    $offer->delete();
    return redirect('dashboard/oferta-academica');
  }

  public function addMultiple(){
    $user = Auth::user();
    return view("admin.academic_offer.add-xlsx")->with(["user" => $user]);
  }

  public function saveMultiple(Request $request){
    $user  = Auth::user();
    $path  = base_path();
    $_path = storage_path('app');
    $_file = str_random(16);
    $file  = $_path . '/' . $_file;
    $request->file('file')->move($_path, $_file);

    Artisan::call("update:admin_mayors", [
      "file" => $file
    ]);
    //exec("php {$path}/artisan update:admin_mayors '{$file}' > /dev/null &");

    
    return redirect("dashboard/oferta-academica");
  }
    //
}
