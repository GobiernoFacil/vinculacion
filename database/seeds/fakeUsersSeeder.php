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

      // [4] crea 5 cámaras de comercio
      Chamber::truncate();
      factory(App\User::class, 5)->create(["type" => "chamber"])->each(function($u){
         $u->chamber()->firstOrCreate(factory(App\models\Chamber::class)->make()->toArray());
      });

      // [5] crea 20 empresas ligadas a un usuario
      Company::truncate();
      factory(App\User::class, 20)->create(["type" => "company"])->each(function($u){
         $u->company()->firstOrCreate(factory(App\models\Company::class)->make()->toArray());
      });

      // [5] crea 15 universidades
      Opd::truncate();
      factory(App\User::class, 15)->create(["type" => "opd"])->each(function($u){
         $u->opd()->firstOrCreate(factory(App\models\Opd::class)->make()->toArray());
      });

      // [6] crea 1000 estudiantes, repartidos entre las distintas universidades
      Student::truncate();

      $opds = User::where("type", "opd")->get();
      $ids  = $opds->pluck("id");
      factory(App\User::class, 100)->create(["type" => "student"])->each(function($u) use($ids){
        $id = $ids->random();
        $u->student()->firstOrCreate(factory(App\models\Student::class)->make([
          "opd_id"     => $id,
          "creator_id" => $id
        ])->toArray());
      });
      
    }
}
