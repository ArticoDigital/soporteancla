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
        //
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

        //$schedule->command('log:test')->everyMinute();
        //$schedule->command('log:testa')->everyMinute();
        $schedule->command('mail:unasigned')->dailyAt('07:00');  //Envía correo si no ha sido asignado el tickets

  /*  $schedule->call(function () {
      ServiceSubcategory::create([
          'name'=>'Subcategoria1',
          'description'=>'Descripcíón ',
          'service_category_id'=>1,
          'isActive' => 1
      ]);
    })->hourly();*/
  }
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
