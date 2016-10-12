<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Excel;

// models
use App\models\Company;
use App\User;

class AddCompaniesByFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:companies {user} {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add / update companies';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $id   = $this->argument('user');
      $user = User::find($id);
      $opd  = $user->opd;
      $file = $this->argument('file');

      Excel::load($file, function($reader) use($user, $opd){
        $reader->each(function($row) use($user, $opd){ 
            if(!empty($row->rfc)){
              $company = Company::firstOrCreate([
                "rfc"        => $row->rfc,
                "creator_id" => $opd->id
              ]);
            }
            elseif(!empty($row->razon_social)){
              $company = Company::firstOrCreate([
                "razon_social" => $row->razon_social,
                "creator_id"   => $opd->id
              ]);
            }
            elseif(!empty($row->nombre_comercial)){
              $company = Company::firstOrCreate([
                "nombre_comercial" => $row->nombre_comercial,
                "creator_id"       => $opd->id
              ]);
            }
            else{
              return;
            }
            
            $company->razon_social     = $row->razon_social;  
            $company->nombre_comercial = $row->nombre_comercial;
            $company->address          = $row->direccion;         
            $company->zip              = $row->codigo_postal;
            $company->phone            = $row->telefono;
            $company->email            = $row->correo;
            $company->giro_comercial   = $row->giro_comercial;
            $company->alcance          = $row->alcance;
            $company->type             = $row->tipo;
            $company->size             = $row->tamano;

            $company->save();

            // [3] Genera el contacto de la empresa
            $contact = $company->contact()->firstOrCreate([
              "name"  => $row->nombre_de_contacto,
              "phone" => $row->telefono_de_contacto,
              "email" => $row->correo_de_contacto
            ]);

            // NOMBRE DE CONTACTO  TELÉFONO DE CONTACTO  CORREO DE CONTACTO
        });
      })->first();
    }
}
