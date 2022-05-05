<?php

namespace App\Console;

use App\Jobs\UrlsCheckJob;
use App\Jobs\GenerateSitemapJob;
use App\Jobs\SiteSearchCrawlJob;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\App;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        'App\Console\Commands\SendNewNoticesToSubscribers'
    ];

    protected function schedule(Schedule $schedule): void {
        $schedule->command('notification:send-news-subscriber')->everyMinute()->environments(['production']);

        if($this->needRenew()){
            if(App::environment(['local', 'dev'])) {
                $schedule->job(new UrlsCheckJob())->everyMinute();
                $schedule->job(new GenerateSitemapJob())->everyMinute();
                $schedule->job(new SiteSearchCrawlJob())->everyMinute();
                $schedule->command('clean:directories')->everyFifteenMinutes();
            } else {
                $schedule->job(new UrlsCheckJob())->everyFifteenMinutes();
                $schedule->job(new GenerateSitemapJob())->dailyAt('03:00');
                $schedule->job(new SiteSearchCrawlJob())->dailyAt('04:00');
                $schedule->command('clean:directories')->dailyAt('05:00');
            }
        }
    }

    protected function commands(): void {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }

    private function needRenew(string $key = '___RELOAD'): bool {
        $storeJson = Valuestore::make(config('farnost-detva.value_store'));

        return !$storeJson->has($key) OR true == $storeJson->get($key);
    }
}
