<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Hash;
// models
use App\User;
use App\models\Company;


// FormValidators
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\SaveCompanyRequest;
class AdminCompanies extends Controller
{
  /*
  * E M P R E S A S
  * ----------------------------------------------------------------
  */

  public function view($id){
    $user    = Auth::user();
    $company = Company::with('user')->find($id);

    return view("admin.companies.company-profile")->with([
      "user"  => $user,
      "company" => $company
    ]);
  }

  public function add(){
    $user    = Auth::user();

    return view("admin.companies.company-add")->with([
      "user"  => $user,
    ]);

  }

  public function save(SaveCompanyRequest $request){

   if($request->email){
    // [1] crea el usuario
    $user = new User([
      'name'    => $request->name,
      'email'   => $request->email,
      'type'    => 'company',
      'enabled' => 1
    ]);
    if(!empty($request->password)){
      $user->password = Hash::make($request->password);
    }

    $user->save();

    // [2] envía el correo de suscripción
    $path = base_path();
    exec("php {$path}/artisan email:send suscribe {$user->id} > /dev/null &");
    // [3] se crea el objeto empresa
    $company = $user->company()->firstOrCreate($request->only(['rfc', 'razon_social', 'nombre_comercial', 'address', 'zip', 'phone','email','giro_comercial','alcance','size']));
    $company->contact()->firstOrCreate([
      "name"  => $request->cname,
      "email" => $request->cemail,
      "phone" => $request->cphone,
    ]);
  }else{
    //[1] Crear empresa sin usuario
    $company = new Company($request->only(['rfc', 'razon_social', 'nombre_comercial', 'address', 'zip', 'phone','email','giro_comercial','alcance','size']));
    $company->save();
    $company->contact()->firstOrCreate([
      "name"  => $request->cname,
      "email" => $request->cemail,
      "phone" => $request->cphone,
    ]);
  }
    // send to view
    return redirect("dashboard/empresa/{$company->id}");
  }

  public function edit($id){
    // [1] el usuario del sistema
    $user = Auth::user();
    // [2] el usuario a editar
    $company  = Company::with("user")->with("contact")->find($id);
    // [3] el view para editar
    return view("admin.companies.company-update")->with([
      "user" => $user,
      "company"  => $company
    ]);

  }

  public function update(UpdateCompanyRequest $request, $id){
    $company = Company::with('user')->find($id);
    if(!empty($request->email)){
      //Compañia no cuenta con usuario
      if(!$company->user){
        // [1] crea el usuario
        $user = new User([
          'name'    => $request->name,
          'email'   => $request->email,
          'type'    => 'company',
          'enabled' => 1
        ]);
        if(!empty($request->password)){
          $user->password = Hash::make($request->password);
        }

        $user->save();
        //agregar usuario a compañia
        $company->user_id = $user->id;
        $company->save();
        $path = base_path();
        exec("php {$path}/artisan email:send new_email {$user->id} > /dev/null &");
      }else{
        $old_email = $company->user->email;
        // update user
        $company->user->name  = $request->name;
        $company->user->email = $request->email;
        if(!empty($request->password)){
          $company->user->password = Hash::make($request->password);
        }
        $company->user->save();
        // send email if distinct
        if($company->user->email != $old_email){
          $path = base_path();
          exec("php {$path}/artisan email:send new_email {$company->user->id} > /dev/null &");
        }
      }
    }

    // update company
    $company->update($request->only(['rfc', 'razon_social', 'nombre_comercial', 'address', 'zip', 'phone','email','giro_comercial','alcance','type','size']));


    // update company contact
    $company->contact->update([
      "name"  => $request->cname,
      "email" => $request->cemail,
      "phone" => $request->cphone,
    ]);

    // send to view
    return redirect("dashboard/empresa/{$id}");

  }

  public function delete($id){
    $company  = Company::find($id);
    $company->contact->delete();
    $company->user->delete();
    $company->delete();
    return redirect('dashboard/empresas');

  }

  public function search(Request $request){
      $member = $request->match;
      $results = User::where('name', 'like', "$member%")
                ->where('type','company')
                 ->orwhere('email','like',"$member%")->get();
      if($results->isempty()){
        $results = Company::where('razon_social', 'like', "$member%")
                   ->orwhere('nombre_comercial','like',"$member%")->get();
        if($results->isempty()){
                   return ['false'];
        }else{
          $temp = array();
          foreach($results as $result){
            $company  = User::with("company.contact")->find($result->user_id);
            $temp[] = $company;
          }
           return response()->json($results)->header('Access-Control-Allow-Origin', '*');
        }
      }else{
        $temp = array();
        foreach($results as $result){
          $company  = User::with("company.contact")->find($result->id);
          $temp[] = $company;
        }
        return response()->json($temp)->header('Access-Control-Allow-Origin', '*');
      }


  }

  public function enableToogle($id){
    $company = User::find($id);
    $company->enabled = ! $company->enabled;
    $company->save();

    return redirect("dashboard/empresa/{$id}");
  }
}
