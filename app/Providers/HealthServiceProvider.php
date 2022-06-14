<?php

namespace App\Providers;

use Spatie\Health\Facades\Health;
use Illuminate\Support\ServiceProvider;
use App\Services\Health\Checks\QueueWorkCheck;

use App\Services\Health\Checks\{
    PingCheck, CacheCheck, DatabaseCheck, ScheduleCheck,
    AppKeySetCheck, DebugModeCheck, EnvironmentCheck, MeiliSearchCheck,
    CacheResponseCheck, EnvFileExistsCheck, UsedDiskSpaceCheck, ConfigIsCachedCheck,
    EventsAreCachedCheck, MaintenanceModeCheck, RoutesAreCachedCheck, StaticPagesCrawlerCheck,
    SslCertificateValidCheck, CspMiddlerwareEnabledCheck, StorageDirectoryIsLinkedCheck,
    CorrectPhpVersionInstalledCheck
};

class HealthServiceProvider extends ServiceProvider
{
    public function boot(): void {
        Health::checks([
            //! critical
            MaintenanceModeCheck::new(),
            QueueWorkCheck::new(),
            StorageDirectoryIsLinkedCheck::new(),
            AppKeySetCheck::new(),
            SslCertificateValidCheck::new()
                ->warnWhenSslCertificationExpiringDay(20)
                ->failWhenSslCertificationExpiringDay(10),
            DatabaseCheck::new(),
            EnvFileExistsCheck::new(),
            CorrectPhpVersionInstalledCheck::new(),

            //! danger
            UsedDiskSpaceCheck::new()
                ->warnWhenUsedSpaceIsAbovePercentage(80)
                ->failWhenUsedSpaceIsAbovePercentage(90),
            ScheduleCheck::new()
                ->useCacheStore(customConfig('config', 'cache.default'))
                ->heartbeatMaxAgeInMinutes(1),
            MeiliSearchCheck::new(),
            EnvironmentCheck::new(),
            DebugModeCheck::new(),
            CspMiddlerwareEnabledCheck::new(),

            //! speed page
            RoutesAreCachedCheck::new(),
            ConfigIsCachedCheck::new(),
            EventsAreCachedCheck::new(),
            CacheCheck::new(),
            CacheResponseCheck::new(),

            //! information
            StaticPagesCrawlerCheck::new(),
            PingCheck::new()->url('https://google.com'),
        ]);
    }
}
