<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Excel;

// models
use App\models\AcademicOffer;

class UpdateAcademicOffer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:admin_mayors {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'actualiza las carreras disponibles mediante el admin';

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
      $file = $this->argument('file');
      Excel::load($file, function($reader){
        $reader->each(function($row){ 
            $offer = AcademicOffer::firstOrCreate([
              "academic_name" => $row->oferta,
              "opd"           => $row->universidad
            ]);

            $offer->city = $row->ubicacion;

            $offer->save();
        });
      })->first();
    }
}
