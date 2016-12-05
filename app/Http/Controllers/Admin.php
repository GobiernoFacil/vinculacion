<?php

namespace App\Http\Controllers;

// libs
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Artisan;
use Hash;

// models
use App\User;
use App\models\AcademicOffer;
use App\models\Chamber;
use App\models\Company;
use App\models\Contract;
use App\models\OpenData;
use App\models\Opd;
use App\models\Student;
use App\models\Vacant;

// FormValidators
use App\Http\Requests\UpdateMeRequest;
use App\Http\Requests\SaveAdminRequest;
use App\Http\Requests\UpdateAdminRequest;


class Admin extends Controller
{
  // el tamaño de la paginación
  public $pageSize = 10;

  /*
   * D A S H B O A R D   Y   L I S T A S   D E   O B J E T O S
   * ----------------------------------------------------------------
   */

  // El dashboard
  //
  //
  public function index(){
    // [1] el usuario del sistema
    $user = Auth::user();

    // [2] contamos cuántos de cada uno
    $admins    = User::where("type", "admin")->where("id", "!=", $user->id)->count();
    $opds      = User::where("type", "opd")->with("opd")->count();
    $chambers  = User::where("type", "chamber")->with("chamber")->count();
    $students  = User::where("type", "student")->with("student")->count();
    $companies = User::where("type", "company")->with("company")->count();
    $secotrade = User::where("type", "puebla")->count();
    $vacancies = Vacant::with('company')->count();
    $contracts = Contract::all()->count();
    $openData  = OpenData::all();
    $busy = OpenData::where("busy", 1)->count();

    // [3] regresa el view
    return view('admin.dashboard')->with([
      "user"      => $user,
      // users
      "admins"    => $admins,
      "opds"      => $opds,
      "chambers"  => $chambers,
      "students"  => $students,
      "companies" => $companies,
	    //vacancies
      "vacancies" => $vacancies,
      //contracts
      "contracts" => $contracts,
      // open data
      "openData"  => $openData,
      "busy"      => $busy,
      "secotrade" => $secotrade
    ]);
  }

  // Los administradores
  // nota: los admins no tienen información fuera del usuario
  //
  public function admins(Request $request){
    // [1] el usuario del sistema
    $user   = Auth::user();

    // [2] todos los usuarios que no son el que está usuando el sistema.
    //     la guía de paginación está aquí:
    //     https://laravel.com/docs/5.2/pagination
    //
    //     en el view se muestra la paginación básica, aunque no está mal.
    $admins = User::where("type", "admin")
                 ->where("id", "!=", $user->id)->paginate($this->pageSize);

    // [3] regresa el view
    return view('admin.users.admin-list')->with([
      "user"   => $user,
      "admins" => $admins
    ]);
  }

  // Las opds
  // **** EL EJEMPLO PARA LAS LISTAS DE USUARIOS ****
  //
  public function opds(Request $request){
    // [1] el usuario del sistema
    $user   = Auth::user();
    // [2] las universidades; esta maroma hace automático lo de la paginación, basta con pasar el
    //      número de elementos por página. Para más info:
    //      https://laravel.com/docs/5.2/pagination
    $opds = User::where("type", "opd")->with("opd")->paginate($this->pageSize);

    // [3] regresa el view
    return view('admin.opds.opd-list')->with([
      "user" => $user,
      "opds" => $opds
    ]);
  }

  // Las cámaras
  //
  //
  public function chambers(Request $request){
    // [1] el usuario del sistema
    $user     = Auth::user();
    // [2] las cámaras de comercio
    $chambers = User::where("type", "chamber")->with("chamber")->paginate($this->pageSize);

    // [3] regresa el view
    return view('admin.chambers.chamber-list')->with([
      "user"     => $user,
      "chambers" => $chambers
    ]);
  }

  // Los estudiantes
  //
  //
  public function students(Request $request){
	  // [1] el usuario del sistema
    $user     = Auth::user();
    // [2] estudiantes
    $students = Student::orderBy('nombre')->with("user.opd")->paginate($this->pageSize);

    // [3] regresa el view
    return view('admin.students.students-list')->with([
      "user"     => $user,
      "students" => $students
    ]);
  }

  // Las empresas
  //
  //
  public function companies(Request $request){
	  // [1] el usuario del sistema
    $user     = Auth::user();

    // [2] empresas
    $companies = Company::orderBy('nombre_comercial', 'asc')->with('user');

    // [3] la búsqueda, si aplica
    if($request->input('searchBox')){
      $companies = $companies->where('nombre_comercial', 'like', "%{$request->input('searchBox')}%")
                   ->orWhere('rfc', 'like', "%{$request->input('searchBox')}%")
                   ->orWhere('razon_social', 'like', "%{$request->input('searchBox')}%")
                   ->orWhere('email', 'like', "%{$request->input('searchBox')}%")
                   ->orWhere('zip', 'like', "%{$request->input('searchBox')}%")
                   ->orWhere('phone', 'like', "%{$request->input('searchBox')}%")
                   ->orWhere('address', 'like', "%{$request->input('searchBox')}%")
                   ->orWhere('giro_comercial', 'like', "%{$request->input('searchBox')}%")
                   ->orWhere('alcance', 'like', "%{$request->input('searchBox')}%")
                   ->orWhere('type', 'like', "%{$request->input('searchBox')}%")
                   ->orWhere('size', 'like', "%{$request->input('searchBox')}%");
    }

    $companies = $companies->paginate($this->pageSize);

    // [4] regresa el view
    return view('admin.companies.companies-list')->with([
      "user"      => $user,
      "companies" => $companies
    ]);
  }

  // Las vacantes
  //
  //
  public function vacancies(Request $request){
    $user      = Auth::user();
    $vacancies = Vacant::orderBy('updated_at', 'desc')->with('company');
    $vacancies = $vacancies->paginate($this->pageSize);
    return view('admin.vacancies.vacancy-list')->with([
      "user"    => $user,
      "vacancies" => $vacancies
    ]);
  }

  // Los convenios
  //
  //
  public function contracts(Request $request){
    $user      = Auth::user();
    $contracts = Contract::orderBy('updated_at', 'desc');
    $contracts = $contracts->paginate($this->pageSize);
    return view('admin.contracts.contracts-list')->with([
      "user"    => $user,
      "contracts" => $contracts
    ]);
  }

  // La oferta académica
  //
  //
  public function offer(Request $request){

  }

  /*
   * G E N E R A R   D A T O S   A B I E R T O S
   * ----------------------------------------------------------------
   */

  // Crear las entradas para cada elemento de descarga de datos abiertos
  //
  //
  public function createOpenData(){
    $opds      = OpenData::firstOrCreate(["resource" => "opds"]);
    $vacancies = OpenData::firstOrCreate(["resource" => "vacancies"]);
    $path      = base_path();
    // $contracts = OpenData::firstOrCreate(["resource" => "contracts"]);

    // genera el archivo para opds
    if(!$opds->file){
      $opds->busy = 1;
      $opds->save();
      //Artisan::call('update:opds_open_data');
      exec("php {$path}/artisan update:opds_open_data > /dev/null &");
    }


    // genera el archivo para vacantes
    if(!$vacancies->file){
      $vacancies->busy = 1;
      $vacancies->save();
      exec("php {$path}/artisan update:vacancies_open_data > /dev/null &");
    }
    /*
    // genera el archivo para contratos
    if(!$contracts->file){
      $contracts->busy = 1;
      $contracts->save();
      exec("php {$path}/artisan update:contracts_open_data > /dev/null &");
    }
    */

    return redirect("dashboard");
  }

  /*
   * P E R F I L   D E L   A D M I N I S T R A D O R
   * ----------------------------------------------------------------
   */

  // El perfil del admin
  //
  //
  public function me(){
    $user = Auth::user();

    return view("admin.me")->with([
      "user" => $user
    ]);
  }

  // el formulario para editarlo
  //
  //
  public function changeMe(){
    $user = Auth::user();

    return view("admin.me-update")->with([
      "user" => $user
    ]);
  }

  // la función que edita al admin
  //
  //
  public function updateMe(UpdateMeRequest $request){
    // La validación de esta maroma está aquí:
    // App\Http\Requests\UpdateMeRequest

    // [1] el usuario del sistema
    $user = Auth::user();

    // [2] actualiza la info de usuario
    $user->name  = $request->name;
    $user->email = $request->email;
    if(!empty($request->password)){
      $user->password = Hash::make($request->password);
    }
    $user->save();

    // [3] lo manda de nuevo al perfil
    return redirect("dashboard/yo")->with("message",'Perfil actualizado correctamente');;
  }





  /*
   * A D M I N I S T R A D O R E S
   * ----------------------------------------------------------------
   */

  //
  //
  //
  public function view($id){
    $user  = Auth::user();
    $admin = User::find($id);

    return view("admin.users.admin-profile")->with([
      "user"  => $user,
      "admin" => $admin
    ]);
  }

  //
  //
  //
  public function add(){
    $user  = Auth::user();

    return view("admin.users.admin-create")->with([
      "user"  => $user
    ]);
  }

  //
  //
  //
  public function save(SaveAdminRequest $request){
    $admin           = new User();
    $admin->type     = "admin";
    $admin->name     = $request->name;
    $admin->email    = $request->email;
    $admin->password = Hash::make($request->password);
    $admin->save();

    return redirect("dashboard/administradores")->with('message','Usuario creado correctamente');
  }

  //
  //
  //
  public function edit($id){
    $user  = Auth::user();
    $admin = User::find($id);

    return view("admin.users.admin-update")->with([
      "user"  => $user,
      "admin" => $admin
    ]);
  }

  //
  //
  //
  public function update(UpdateAdminRequest $request, $id){
    $admin        = User::find($id);
    $admin->name  = $request->name;
    $admin->email = $request->email;

    if(!empty($request->password)){
      $admin->password = Hash::make($request->password);
    }
    $admin->save();

    return redirect("dashboard/administrador/$id")->with("message",'Usuario actualizado correctamente');
  }

  //
  //
  //
  public function delete($id){
     $user         = Auth::user();
     if($user->id != $id){
       $admin        = User::find($id);
       $admin->delete();
     }
     return redirect("dashboard/administradores")->with("message",'Usuario eliminado correctamente');
  }

  //
  //
  //
  public function make_open_data(){

  }

}
