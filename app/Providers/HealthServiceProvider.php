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
