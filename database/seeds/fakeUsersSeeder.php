<?php

// load libraries / facades
use Illuminate\Database\Seeder;
//use Hash;

// load models
use App\User;
use App\models\Student;
use App\models\Company;
use App\models\Opd;
use App\models\Chamber;


class fakeUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // [1] vacía la tabla de usuarios
      User::truncate();

      // [2] crea el admin principal. Si no se define en el .env, toma los valores de default
      $admin = new User();
      $admin->name     =  env('ADMIN_NAME', "Arturo Córdova");
      $admin->email    =  env('ADMIN_EMAIL', "howdy@gobiernofacil.com");
      $admin->password =  Hash::make(env('ADMIN_PASSWORD', "morenazi1984"));
      $admin->type     = "admin";
      $admin->enabled  = 1;
      $admin->save();

      // [3] crea dos administradores deshabilitados
      factory(App\User::class, 2)->create(["type" => "admin"])->each(function($u){
         //$u->posts()->save(factory(App\Post::class)->make());
      });

      // [4] crea 3 cámaras de comercio
      Chamber::truncate();
      factory(App\User::class, 20)->create(["type" => "chamber"])->each(function($u){
         $u->chamber()->firstOrCreate(factory(App\models\Chamber::class)->make()->toArray());//chamber()->save(factory(App\Post::class)->make());
      });
      
    }
}
