<?php

namespace App\Providers;

use Spatie\Health\Facades\Health;
use Illuminate\Support\ServiceProvider;
use App\Services\Health\Checks\CustomPingCheck;
use App\Services\Health\Checks\CustomCacheCheck;
use App\Services\Health\Checks\CustomDatabaseCheck;
use App\Services\Health\Checks\CustomScheduleCheck;
use App\Services\Health\Checks\CustomDebugModeCheck;
use App\Services\Health\Checks\CustomEnvironmentCheck;
use App\Services\Health\Checks\CustomMeiliSearchCheck;
use App\Services\Health\Checks\CustomCacheResponseCheck;
use App\Services\Health\Checks\CustomUsedDiskSpaceCheck;

class HealthServiceProvider extends ServiceProvider
{
    public function register(): void {
        //
    }

    public function boot(): void {
        Health::checks([
            CustomDatabaseCheck::new(),
            CustomScheduleCheck::new(),
            CustomMeiliSearchCheck::new(),
            CustomDebugModeCheck::new(),
            CustomEnvironmentCheck::new(),
            CustomUsedDiskSpaceCheck::new(),
            CustomCacheCheck::new(),
            CustomCacheResponseCheck::new(),
            CustomPingCheck::new()->url('https://google.com'),
        ]);
    }
}
