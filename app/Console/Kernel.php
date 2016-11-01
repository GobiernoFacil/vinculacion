<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
      Commands\sendEmails::class,
      Commands\UpdateStudents::class,
      Commands\Inspire::class,
      Commands\AddCompaniesByFile::class,
      Commands\AddAdminCompaniesByFile::class,
      Commands\ChamberCompaniesByFile::class,
      Commands\FindAcademicOffer::class,
      Commands\UpdateAcademicOffer::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }
}
