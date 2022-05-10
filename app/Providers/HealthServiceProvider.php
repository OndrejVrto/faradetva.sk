<?php

namespace App\Providers;

use Spatie\Health\Facades\Health;
use Illuminate\Support\ServiceProvider;
use App\Services\Health\Checks\AppKeySetCheck;
use App\Services\Health\Checks\CustomPingCheck;
use App\Services\Health\Checks\CustomCacheCheck;
use App\Services\Health\Checks\CacheResponseCheck;
use App\Services\Health\Checks\EnvFileExistsCheck;
use App\Services\Health\Checks\ConfigIsCachedCheck;
use App\Services\Health\Checks\CustomDatabaseCheck;
use App\Services\Health\Checks\CustomScheduleCheck;
use App\Services\Health\Checks\CustomDebugModeCheck;
use App\Services\Health\Checks\EventsAreCachedCheck;
use App\Services\Health\Checks\RoutesAreCachedCheck;
use App\Services\Health\Checks\CustomEnvironmentCheck;
use App\Services\Health\Checks\CustomMeiliSearchCheck;
use App\Services\Health\Checks\CustomUsedDiskSpaceCheck;
use App\Services\Health\Checks\SslCertificateValidCheck;
use App\Services\Health\Checks\CspMiddlerwareEnabledCheck;
use App\Services\Health\Checks\StorageDirectoryIsLinkedCheck;
use App\Services\Health\Checks\CorrectPhpVersionInstalledCheck;
use App\Services\Health\Checks\ComposerDependenciesUpToDateCheck;

class HealthServiceProvider extends ServiceProvider
{
    public function boot(): void {
        Health::checks([
            CustomDatabaseCheck::new(),
            CustomScheduleCheck::new(),
            CustomMeiliSearchCheck::new(),
            CustomDebugModeCheck::new(),
            CustomEnvironmentCheck::new(),
            CustomUsedDiskSpaceCheck::new()
                ->warnWhenUsedSpaceIsAbovePercentage(80)
                ->failWhenUsedSpaceIsAbovePercentage(90),
            CustomCacheCheck::new(),
            CustomPingCheck::new()->url('https://google.com'),

            CacheResponseCheck::new(),
            RoutesAreCachedCheck::new(),
            ConfigIsCachedCheck::new(),
            EventsAreCachedCheck::new(),
            StorageDirectoryIsLinkedCheck::new(),
            EnvFileExistsCheck::new(),
            CorrectPhpVersionInstalledCheck::new(),
            ComposerDependenciesUpToDateCheck::new(),
            AppKeySetCheck::new(),
            SslCertificateValidCheck::new(),
            CspMiddlerwareEnabledCheck::new(),

        ]);
    }
}
