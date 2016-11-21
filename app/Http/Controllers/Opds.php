<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use File;
use Image;
// models
use App\User;

class Opds extends Controller
{
  // el tamaño de la paginación
  public $pageSize = 10;
  // En esta carpeta se guardan las imágenes de los logos
  const UPLOADS = "img/logos";

  const BANNERS = "img/banners";

  /*
   * D A S H B O A R D   Y   L I S T A   D E   O B J E T O S
   * ----------------------------------------------------------------
   */

  // El dashboard
  //
  //
  public function index(){
    // [1] el usuario del sistema
    $user = Auth::user();

    // [2] contamos cuántos de cada uno
    $opd       = $user->opd;
    $students  = $opd->students->count();
    $companies = $opd->companies->count();
    $contracts = $opd->contracts->count();
    
    $students_h = $opd->students()->has('user')->get();
    
    $companies_h = User::where(["type"=> "company", "enabled"=>0] )->with("company")->count();
    
    // [3] regresa el view
    return view('opds.dashboard')->with([
      "user"      	=> $user,
      // students
      "students"  	=> $students,
      "students_h"  => $students_h,
      // companies
      "companies"	=> $companies,
      "companies_h" => $companies_h,     
      // contracts
      "contracts" 	=> $contracts
      
    ]);
  }

  // Las cámaras
  //
  //
  public function chambers(){

  }

  // Los estudiantes
  //
  //
  public function students(){
    // [1] el usuario del sistema
    $user     = Auth::user();
    $opd = $user->opd;
    // [2] estudiantes
    $students_num = $opd->students->count();
    $students     = $opd->students()->paginate($this->pageSize);

    // [3] regresa el view
    return view('opds.students.students-list')->with([
      "user"     => $user,
      "students" => $students
    ]);
  }

  // Los estudiantes
  //
  //
  public function studentUsers(){
    // [1] el usuario del sistema
    $user = Auth::user();
    $opd  = $user->opd;
    // [2] estudiantes
    $students_num = $opd->students()->has('user')->count();
    $students     = $opd->students()->has('user')->paginate($this->pageSize);

    // [3] regresa el view
    return view('opds.students.students-user-list')->with([
      "user"     => $user,
      "students" => $students
    ]);
  }

  // Los estudiantes deshabilitados
  //
  //
  public function studentUsersDisabled(){
    // [1] el usuario del sistema
    $user = Auth::user();
    $opd  = $user->opd;
    // [2] estudiantes
    $students_num = $opd->students()->has('user')->count();
    $students     = $opd->students()->has('user')->paginate($this->pageSize);

    // [3] regresa el view
    return view('opds.students.students-user-disabled')->with([
      "user"     => $user,
      "students" => $students
    ]);
  }
  
  // Las empresas
  //
  //
  public function companies(){
    // [1] el usuario del sistema
    $user = Auth::user();
    $opd  = $user->opd;

    // [2] empresas
    $companies_num = $opd->companies->count();
    $companies     = $opd->companies()->paginate($this->pageSize);

    // [3] regresa el view
    return view('opds.companies.companies-list')->with([
      "user"     => $user,
      "companies" => $companies
    ]);
  }
  
  
  // Las empresas por habilitar
  //
  //
  public function companiesDisabled(){
    // [1] el usuario del sistema
    $user = Auth::user();
    $opd  = $user->opd;

    // [2] empresas
    $companies_num = User::where(["type"=> "company", "enabled"=>0] )->with("company")->count();
    $companies 	   = User::where(["type"=> "company", "enabled"=>0] )->with("company")->paginate($this->pageSize);

    // [3] regresa el view
    return view('opds.companies.companies-list-disabled')->with([
      "user"     => $user,
      "companies" => $companies
    ]);
  }


  // Las vacantes
  //
  //
  public function vacancies(){

  }

  // Los convenios
  //
  //
  public function contracts(){
  	$user = Auth::user();
    $opd = $user->opd;
    $contracts_num = $opd->contracts->count();
    $contracts     = $opd->contracts()->paginate($this->pageSize);

    return view("opds.contracts.list")->with([
      "user" => $user,
      "contracts"  =>$contracts
    ]);


  }


  /*
   * ESTADISTICAS   D E  L A   O P D
   * ----------------------------------------------------------------
   */

   public function stats(){
    $user = Auth::user();
    $opd = $user->opd;
    return view("opds.stats.reports")->with([
      "user" => $user,
      "opd"  =>$opd
    ]);
  }

  /*
   * P E R F I L   D E  L A   O P D
   * ----------------------------------------------------------------
   */

  public function me(){
    $user = Auth::user();
    $opd = $user->opd;
    return view("opds.me.me")->with([
      "user" => $user,
      "opd"  =>$opd
    ]);
  }

  public function changeMe(){
    $user = Auth::user();
    $opd = $user->opd;
    return view("opds.me.me-update")->with([
      "user" => $user,
      "opd"  =>$opd
    ]);
  }

  public function updateMe(Request $request){
      $user = Auth::user();
      $user->name = $request->name;
      $user->email = $request->email;
        if(!empty($request->password)){
          $user->password = Hash::make($request->password);
        }
     $user->save();
     $opd = $user->opd;
     $opd->update($request->only(['address', 'zip', 'city', 'state', 'url']));
     $opd->opd_name = $request->name;
     $opd->save();
     //logo
     $path  = public_path(self::UPLOADS);
     // [ SAVE THE IMAGE ]
     if($request->hasFile('logo') && $request->file('logo')->isValid()){
       //[erase image]
       if($opd->logo){
         File::delete(self::UPLOADS.'/'.$opd->logo);
       }
       $name = uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
       $request->file('logo')->move($path, $name);
       $opd->logo = $name;
       $opd->save();
     }
     //banner
     $path  = public_path(self::BANNERS);
     // [ SAVE THE IMAGE ]
     if($request->hasFile('banner') && $request->file('banner')->isValid()){
       //[erase images]
       if($opd->banner){
         File::delete(self::BANNERS.'/'.$opd->banner);
       }
       if($opd->small_banner){
         File::delete(self::BANNERS.'/'.$opd->small_banner);
       }
       $name = uniqid() . '.' . $request->file('banner')->getClientOriginalExtension();
       $request->file('banner')->move($path, $name);
       $opd->banner = $name;
       $opd->save();
       //small banner
       $small_name = uniqid() . '.' . $request->file('banner')->getClientOriginalExtension();
       Image::make(self::BANNERS.'/'.$name)->resize(265,200)->save(self::BANNERS.'/'.$small_name);
       $opd->small_banner = $small_name;
       $opd->save();
     }
     return redirect("tablero-opd/yo")->with('message','Perfil actualizado correctamente');

  }
}
