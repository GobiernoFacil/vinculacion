<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

// libraries
use League\Csv\Writer;
use League\Csv\Reader;
use Excel;

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

class createVacantsOpenData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:vacancies_open_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
      $vacancies = OpenData::firstOrCreate(["resource" => "vacancies"]);
      $vacancies->available = 0;
      $vacancies->busy = 1;
      $vacancies->file = "vacantes";
      $vacancies->update();

      $path =  public_path('csv');

      $_vacancies = Vacant::all();
      $title = $vacancies->file;

      Excel::create($title, function($excel) use($_vacancies) {
      // Set the title
      $excel->setTitle("Lista de vacantes en el sistema");

      $excel->setCreator('Secretaría de Educación Pública del Estado de Puebla');

      $excel->setDescription("vacantes en el sistema");

      $excel->sheet("vacantes", function($sheet) use($_vacancies){
        
        $titles    = ['id', 'nombre', 'etiquetas', 'edad mínima', 'edad máxima', 'disponibilidad para viajar', 
        'puede cambiar de residencia', 'experiencia', 'salario', 'de', 'a', 'prestaciones',
        'capacitación', 'estado', 'ciudad', 'especialidad', 'estatus', 'url'];
        $sheet->appendRow($titles);
        foreach ($_vacancies as $vacancy) {
          $d = [$vacancy->id, $vacancy->job, $vacancy->tags, $vacancy->age_from, $vacancy->age_to, 
                $vacancy->travel, $vacancy->location, $vacancy->experience, $vacancy->salary, $vacancy->work_from,
                $vacancy->work_to, $vacancy->benefits, $vacancy->training, $vacancy->state, $vacancy->city,
                $vacancy->speciality, $vacancy->status, $vacancy->url];
          $sheet->appendRow($d);
        }
      });
    })->store('xlsx', $path);

    $vacancies->busy = 0;
    $vacancies->available = 1;
    $vacancies->update();
    }
}
