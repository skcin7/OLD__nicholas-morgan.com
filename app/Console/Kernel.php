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

        $environment = config('app.env');
        $schedule->command(
            "db:backup --database=mysql --destination=dropbox --destinationPath=nicholas-morgan/" . $environment . "/ --timestamp='Y-m-d-H-i-s' --compression=gzip"
         )->daily();

//        $schedule->command('db:backup --database=mysql --destination=dropbox --destinationPath=nicholas-morgan/ --timestamp="Y-m-d-H-i-s" --compression=gzip')->daily();

        // List:
        // php artisan db:list --source=dropbox --path=nicholas-morgan

        // Restore:
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
