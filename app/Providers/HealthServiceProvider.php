<?php

namespace App\Providers;

use Spatie\Health\Facades\Health;
use Illuminate\Support\ServiceProvider;
use App\Services\Health\Checks\{
    PingCheck, CacheCheck, DatabaseCheck, ScheduleCheck,
    AppKeySetCheck, DebugModeCheck, EnvironmentCheck, MeiliSearchCheck,
    CacheResponseCheck, EnvFileExistsCheck, UsedDiskSpaceCheck, ConfigIsCachedCheck,
    EventsAreCachedCheck, RoutesAreCachedCheck, StaticPagesCrawlerCheck, SslCertificateValidCheck,
    CspMiddlerwareEnabledCheck, StorageDirectoryIsLinkedCheck, CorrectPhpVersionInstalledCheck, ComposerDependenciesUpToDateCheck
};

class HealthServiceProvider extends ServiceProvider
{
    public function boot(): void {
        Health::checks([
            // critical
            StorageDirectoryIsLinkedCheck::new(),
            AppKeySetCheck::new(),
            SslCertificateValidCheck::new()
                ->warnWhenSslCertificationExpiringDay(20)
                ->failWhenSslCertificationExpiringDay(10),
            DatabaseCheck::new(),
            EnvFileExistsCheck::new(),
            CorrectPhpVersionInstalledCheck::new(),

            // danger
            UsedDiskSpaceCheck::new()
                ->warnWhenUsedSpaceIsAbovePercentage(80)
                ->failWhenUsedSpaceIsAbovePercentage(90),
            ScheduleCheck::new(),
            MeiliSearchCheck::new(),
            EnvironmentCheck::new(),
            DebugModeCheck::new(),
            CspMiddlerwareEnabledCheck::new(),
            ComposerDependenciesUpToDateCheck::new(),

            // speed page
            RoutesAreCachedCheck::new(),
            ConfigIsCachedCheck::new(),
            EventsAreCachedCheck::new(),
            CacheCheck::new(),
            CacheResponseCheck::new(),

            // information
            StaticPagesCrawlerCheck::new(),
            PingCheck::new()->url('https://google.com'),
        ]);
    }
}