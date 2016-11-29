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

class createOpdsOpenData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:opds_open_data';

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
    public function handle(){
      $opds = OpenData::firstOrCreate(["resource" => "opds"]);
      $opds->available = 0;
      $opds->busy = 1;
      $opds->file = "universidades";
      $opds->update();

      $path =  public_path('csv');

      $_opds = Opd::all();
      $title = $opds->file;

      Excel::create($title, function($excel) use($_opds) {
      // Set the title
      $excel->setTitle("Lista de universidades en el sistema");

      $excel->setCreator('Secretaría de Educación Pública del Estado de Puebla');

      $excel->setDescription("Universidades en el sistema");

      $excel->sheet("universidades", function($sheet) use($_opds){
        
        $titles    = ['nombre', 'url', 'ciudad', 'estado', 'dirección', 'código postal'];
        $sheet->appendRow($titles);
        foreach ($_opds as $opd) {
          $d = [$opd->opd_name, $opd->url, $opd->city, $opd->state, $opd->address, $opd->zip];
          $sheet->appendRow($d);
        }
      });
    })->store('xlsx', $path);

    $opds->busy = 0;
    $opds->available = 1;
    $opds->update();
  }
}
