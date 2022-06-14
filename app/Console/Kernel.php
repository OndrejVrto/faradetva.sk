<?php

namespace App\Console;

use App\Jobs\UrlsCheckJob;
use App\Jobs\GenerateSitemapJob;
use App\Jobs\SiteSearchCrawlJob;
use Illuminate\Support\Facades\App;
use Illuminate\Console\Scheduling\Schedule;
use Spatie\Health\Commands\RunHealthChecksCommand;
use Spatie\Health\Models\HealthCheckResultHistoryItem;
use Spatie\Health\Commands\ScheduleCheckHeartbeatCommand;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        'App\Console\Commands\SendNewNoticesToSubscribers'
    ];

    protected function schedule(Schedule $schedule): void {
        $schedule->command('notification:send-news-subscriber')->everyMinute()->environments(['production']);

        // Laravel Health commands
        $schedule->command(ScheduleCheckHeartbeatCommand::class)->everyMinute();
        $schedule->command(RunHealthChecksCommand::class)->everyFiveMinutes();
        $schedule->command('model:prune', [
            '--model' => [ HealthCheckResultHistoryItem::class ]
        ])->dailyAt('02:00');

        if($this->needRenew()){
            if(App::environment(['local', 'dev'])) {
                $schedule->job(new UrlsCheckJob())->everyFiveMinutes();
                $schedule->job(new GenerateSitemapJob())->everyFiveMinutes();
                $schedule->job(new SiteSearchCrawlJob())->everyFiveMinutes();
                $schedule->command('clean:directories')->everyFifteenMinutes();
            } else {
                $schedule->job(new UrlsCheckJob())->dailyAt('03:00');
                $schedule->job(new GenerateSitemapJob())->dailyAt('03:15');
                $schedule->job(new SiteSearchCrawlJob())->dailyAt('03:30');
                $schedule->command('clean:directories')->dailyAt('03:45');
            }
        }
    }

    protected function commands(): void {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }

    private function needRenew(string $key = '___RELOAD'): bool {
        $storeJson = customConfig('crawler');

        return !$storeJson->has($key) OR true == $storeJson->get($key);
    }
}
