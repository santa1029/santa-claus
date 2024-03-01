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
        Commands\PeriodicCheckDD::class,
        Commands\PeriodicCheckSB::class,
        Commands\EndTrial::class,
        Commands\GetDailyBalances::class,
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
        $schedule->command('checkdd:periodic')->everyFifteenMinutes();
        $schedule->command('endtrial:daily')->dailyAt('04:15');
        $schedule->command('checksb:periodic')->everyFiveMinutes;
        $schedule->command('getbalances:daily')->dailyAt('05:15');
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
