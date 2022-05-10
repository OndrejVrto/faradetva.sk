<?php

namespace App\Providers;

use Spatie\Health\Facades\Health;
use Illuminate\Support\ServiceProvider;
use App\Services\Health\Checks\PingCheck;
use App\Services\Health\Checks\CacheCheck;
use App\Services\Health\Checks\DatabaseCheck;
use App\Services\Health\Checks\ScheduleCheck;
use App\Services\Health\Checks\AppKeySetCheck;
use App\Services\Health\Checks\DebugModeCheck;
use App\Services\Health\Checks\EnvironmentCheck;
use App\Services\Health\Checks\MeiliSearchCheck;
use App\Services\Health\Checks\CacheResponseCheck;
use App\Services\Health\Checks\EnvFileExistsCheck;
use App\Services\Health\Checks\UsedDiskSpaceCheck;
use App\Services\Health\Checks\ConfigIsCachedCheck;
use App\Services\Health\Checks\EventsAreCachedCheck;
use App\Services\Health\Checks\RoutesAreCachedCheck;
use App\Services\Health\Checks\StaticPagesCrawlerCheck;
use App\Services\Health\Checks\SslCertificateValidCheck;
use App\Services\Health\Checks\CspMiddlerwareEnabledCheck;
use App\Services\Health\Checks\StorageDirectoryIsLinkedCheck;
use App\Services\Health\Checks\CorrectPhpVersionInstalledCheck;
use App\Services\Health\Checks\ComposerDependenciesUpToDateCheck;

class HealthServiceProvider extends ServiceProvider
{
    public function boot(): void {
        Health::checks([
            StaticPagesCrawlerCheck::new(),
            DatabaseCheck::new(),
            ScheduleCheck::new(),
            MeiliSearchCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
            UsedDiskSpaceCheck::new()
                ->warnWhenUsedSpaceIsAbovePercentage(80)
                ->failWhenUsedSpaceIsAbovePercentage(90),
            CacheCheck::new(),
            PingCheck::new()->url('https://google.com'),
            CacheResponseCheck::new(),
            RoutesAreCachedCheck::new(),
            ConfigIsCachedCheck::new(),
            EventsAreCachedCheck::new(),
            StorageDirectoryIsLinkedCheck::new(),
            EnvFileExistsCheck::new(),
            CorrectPhpVersionInstalledCheck::new(),
            ComposerDependenciesUpToDateCheck::new(),
            AppKeySetCheck::new(),
            SslCertificateValidCheck::new()
                ->warnWhenSslCertificationExpiringDay(20)
                ->failWhenSslCertificationExpiringDay(10),
            CspMiddlerwareEnabledCheck::new(),

        ]);
    }
}
