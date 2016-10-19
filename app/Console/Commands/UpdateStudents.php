<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Excel;

// models
use App\models\Student;
use App\User;

class UpdateStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:students {user} {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add / update students';

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
      //  MATRÍCULA NOMBRE  APELLIDO PATERNO  APELLIDO MATERNO  CURP  CARRERA STATUS
      $id   = $this->argument('user');
      $user = User::find($id);
      $opd  = $user->opd;
      $file = $this->argument('file');

      Excel::load($file, function($reader) use($user, $opd){
        $reader->each(function($row) use($user, $opd){ 
            $student = $opd->students()->firstOrCreate([
              "matricula" => $row->matricula
            ]);

            $student->nombre           = $row->nombre;
            $student->apellido_paterno = $row->apellido_paterno;
            $student->apellido_materno = $row->apellido_materno;
            $student->curp             = $row->curp;
            $student->carrera          = $row->carrera;
            $student->status           = $row->status;
            $student->nombre_completo  = $row->nombre_completo;

            $student->save();
        });
      })->first();
    }
}
