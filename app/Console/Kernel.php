<?php

namespace App\Console;

use App\Console\Commands\expiration;
use App\Console\Commands\Notify;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {

         $schedule->command('user:expire')->everyMinute();
         $schedule->command('email:notify')->everyMinute();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        expiration::class;
        Notify::class;

        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
