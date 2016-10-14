<?php

use Illuminate\Database\Seeder;

// load models
use App\User;

class OnlyAdminSeeder extends Seeder
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
      
      // [3] crea el admin de empleos del estado de Puebla. Si no se define en el .env, toma los valores de default
      $admin_puebla = new User();
      $admin_puebla->name     =  env('ADMIN_PUEBLA_NAME', "Juan Pérez");
      $admin_puebla->email    =  env('ADMIN_PUEBLA_EMAIL', "howdy@inegifacil.com");
      $admin_puebla->password =  Hash::make(env('ADMIN_PUEBLA_PASSWORD', "puebla34012"));
      $admin_puebla->type     = "puebla";
      $admin_puebla->enabled  = 1;
      $admin_puebla->save();
    }
}
