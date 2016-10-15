<?php

use Illuminate\Database\Seeder;

// use League\Csv\Reader;
// use Excel;
// use Auth;
// use Hash;

use App\User;
use App\models\Opd;
use App\models\Contact;

class RealOpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Excel::load(base_path('data/universidades.xlsx'), function($reader){
        // [0] utiliza el excel que está en /data/universidades.xlsx para llenar la DB de opds
        $reader->each(function($row){
          // [1] Genera el usuario para la opd
          $opd_user           = new User;
          $opd_user->email    = "fake_user_" . uniqid() . "@gape.mx";
          $opd_user->type     = "opd";
          $opd_user->enabled  = 1;
          $opd_user->name     = $row->universidad;
          $opd_user->password = Hash::make(str_random(16));
          $opd_user->save();
          
          // [2] Genera la opd
          $opd           = new Opd;
          $opd->opd_name = $row->universidad;
          $opd->url      = $row->url;
          $opd->city     = $row->municipio;
          $opd->state    = $row->estado;
          $opd->address  = $row->dirección;
          $opd->zip      = $row->zip;
          $opd->user_id  = $opd_user->id;
          $opd->save();

          // [3] Genera el contacto de la opd
          $contact = $opd->contact()->firstOrCreate([
            "name"  => $row->contacto,
            "phone" => $row->telefono,
            "email" => $row->email
          ]);
        }); // $reader->each
      })->first(); // Excel::load

      $this->command->info('opds table seeded!');
    }
}


// base_path