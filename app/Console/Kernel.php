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
        $schedule->command('congratulation:new_year')->cron('0 2 1 1 *')->yearly()->timezone('America/New_York');
        $schedule->command('congratulation:new_year')->cron('0 22 28 12 *')->timezone('Europe/Kiev');
        $schedule->command('congratulation:new_year')->cron('10 19 28 12 *');
        $schedule->command('congratulation:new_year')->cron('15 19 28 12 *');
        $schedule->command('congratulation:new_year')->cron('05 19 28 12 *')->timezone('Europe/Kiev');
        $schedule->command('congratulation:new_year')->cron('12 19 28 12 *')->timezone('Europe/Kiev');
        $schedule->command('congratulation:new_year')->cron('30 19 28 12 *')->timezone('Europe/Kiev');
        $schedule->command('congratulation:new_year')->cron('35 19 28 12 *')->timezone('Europe/Kiev');
        $schedule->command('congratulation:new_year')->cron('45 19 28 12 *')->timezone('Europe/Kiev');
        $schedule->command('congratulation:new_year')->cron('0 20 28 12 *')->timezone('Europe/Kiev');
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
