<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

// models
use App\models\AcademicOffer;
use App\models\Opd;
use App\models\Student;
use App\User;

class FindAcademicOffer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:mayors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'genera una lista con la oferta laboral';

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
        $offers = Student::select('carrera')->distinct()->get();

        $bar = $this->output->createProgressBar($offers->count());
        
        foreach($offers as $offer){
            $c = AcademicOffer::firstOrCreate([
                "academic_name" => $offer->carrera
            ]);
            $bar->advance();
        }

        $bar->finish();
    }
}
