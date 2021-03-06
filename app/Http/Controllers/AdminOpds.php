<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Hash;
use Image;

// models
use App\User;
use App\models\Opd;
use App\models\AcademicOffer;

// FormValidators
use App\Http\Requests\UpdateOpdRequest;
use App\Http\Requests\SaveOpdRequest;
use File;
class AdminOpds extends Controller
{
  // En esta carpeta se guardan las imágenes de los logos
  const UPLOADS = "img/logos";
  const BANNERS = "img/banners";
  /*
   * O P D S
   * ----------------------------------------------------------------
   */

  public function view($id){
  	$user  	= Auth::user();
    $opd 	= Opd::with('user')->find($id);
    $offers = AcademicOffer::where('opd_id', $id)->orderBy("academic_name", "asc")->get();
    return view("admin.opds.opd-profile")->with([
      "user"  => $user,
      "opd" => $opd,
      "offers" => $offers
    ]);
  }

  public function add(){
    $user  = Auth::user();

    return view("admin.opds.opd-add")->with([
      "user"  => $user,
    ]);
  }

  public function save(SaveOpdRequest  $request){

       if($request->email){
        // [1] crea el usuario
        $user = new User([
          'name'    => $request->name,
          'email'   => $request->email,
          'type'    => 'opd',
          'enabled' => 1
        ]);
        if(!empty($request->password)){
          $user->password = Hash::make($request->password);
        }

        $user->save();

        // [2] envía el correo de suscripción
        $path = base_path();
        exec("php {$path}/artisan email:send suscribe {$user->id} > /dev/null &");
        // [3] se crea el objeto universidad
        $opd = $user->opd()->firstOrCreate($request->only(['opd_name', 'url', 'city', 'state', 'address', 'zip']));
        $path  = public_path(self::UPLOADS);
        // [ SAVE THE IMAGE ]
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
          $name = uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
          $request->file('logo')->move($path, $name);
          $opd->logo = $name;
          $opd->save();
        }
        //banner
        $path  = public_path(self::BANNERS);
        // [ SAVE THE IMAGE ]
        if($request->hasFile('banner') && $request->file('banner')->isValid()){
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
        $opd->contact()->firstOrCreate([
          "name"  => $request->cname,
          "email" => $request->cemail,
          "phone" => $request->cphone,
        ]);
      }else{
        //[1] Crear universidad sin usuario
        $opd = new Opd($request->only(['opd_name', 'url', 'city', 'state', 'address', 'zip']));
        $opd->save();
        //logo
        $path  = public_path(self::UPLOADS);
        // [ SAVE THE IMAGE ]
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
          $name = uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
          $request->file('logo')->move($path, $name);
          $opd->logo = $name;
          $opd->save();
        }
        //banner
        $path  = public_path(self::BANNERS);
        // [ SAVE THE IMAGE ]
        if($request->hasFile('banner') && $request->file('banner')->isValid()){
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
        $opd->contact()->firstOrCreate([
          "name"  => $request->cname,
          "email" => $request->cemail,
          "phone" => $request->cphone,
        ]);
      }
        // send to view
        return redirect("dashboard/opd/{$opd->id}")->with('message','Universidad creada correctamente');
  }

  public function edit($id){
    // [1] el usuario del sistema
    $user = Auth::user();
    // [2] el usuario a editar
    $opd  = Opd::with("user")->with("contact")->find($id);
    // [3] el view para editar
    return view("admin.opd-update")->with([
      "user" => $user,
      "opd"  => $opd
    ]);
  }

  public function update(UpdateOpdRequest $request, $id){
    $opd = Opd::with('user')->find($id);
    if(!empty($request->email)){
      //Compañia no cuenta con usuario
      if(!$opd->user){
        // [1] crea el usuario
        $user = new User([
          'name'    => $request->name,
          'email'   => $request->email,
          'type'    => 'opd',
          'enabled' => 1
        ]);
        if(!empty($request->password)){
          $user->password = Hash::make($request->password);
        }

        $user->save();
        //agregar usuario a compañia
        $opd->user_id = $user->id;
        $opd->save();
        $path = base_path();
        exec("php {$path}/artisan email:send new_email {$user->id} > /dev/null &");
      }else{
        $old_email = $opd->user->email;
        // update user
        $opd->user->name  = $request->name;
        $opd->user->email = $request->email;
        if(!empty($request->password)){
          $opd->user->password = Hash::make($request->password);
        }
        $opd->user->save();
        // send email if distinct
        if($opd->user->email != $old_email){
          $path = base_path();
          exec("php {$path}/artisan email:send new_email {$opd->user->id} > /dev/null &");
        }
      }
    }

    // update university
    $opd->update($request->only(['opd_name', 'url', 'city', 'state', 'address', 'zip']));
    //logo
    $path  = public_path(self::UPLOADS);
    // [ SAVE THE IMAGE ]
    if($request->hasFile('logo') && $request->file('logo')->isValid()){
      //[erase images]
      if($opd->logo){
        File::delete(self::UPLOADS.'/'.$opd->logo);
      }
      if($opd->small_banner){
        File::delete(self::BANNERS.'/'.$opd->small_banner);
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
      //[erase image]
      if($opd->banner){
        File::delete(self::BANNERS.'/'.$opd->banner);
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

    // update university contact
    $opd->contact->update([
      "name"  => $request->cname,
      "email" => $request->cemail,
      "phone" => $request->cphone,
    ]);

    // send to view
    return redirect("dashboard/opd/{$id}")->with('message','Universidad actualizada correctamente');

  }

  public function delete($id){
    $opd  = Opd::find($id);
    $opd->contact->delete();
    $opd->user->delete();
    $opd->delete();
    return redirect('dashboard/opds')->with('message','Universidad eliminada correctamente');;
  }
}
