<?php

return [

    // global short answer
    'ok'      => 'OK',
    'warning' => 'Warning',
    'failed'  => 'Error',
    'crashed' => 'Failed',

    'cache' => [
        'label'       => 'Cache',
        'ok'          => 'OK :eol Driver: `:driver`',
        'failed'      => 'Could not set or retrieve an application cache value. :eol Used driver: `:driver`.',
        'exception'   => 'An exception occurred with the application cache: `:exceptionMessage`. :eol Used driver: `:driver`.',
    ],

    'cache_response' => [
        'label'       => 'Cache response',
        'ok'          => 'OK. During `:time` :eol Driver: `:driver`',
        'failed'      => 'Cache response turn off. :eol Used driver: `:driver`.',
        'exception'   => 'Exception occurred: `:exceptionMessage`. :eol Used driver: `:driver`.',
    ],

    'database_connection' => [
        'label'       => 'Database connection',
        'ok'          => 'OK',
        'exception'   => 'Could not connect to the database: `:exceptionMessage`. :eol Used connection: `:connection_name`.',
    ],

    'debug_mode' => [
        'label'       => 'Debug mode',
        'ok'          => 'OK. Is off.',
        'failed'      => 'Still running.',
    ],

    'environment' => [
        'label'       => 'Environment',
        'ok'          => 'It is currently set to: `:actual`.',
        'failed'      => 'Required: `:expected`, :eol but actually was: `:actual`.',
    ],

    'meili-search' => [
        'label'             => 'Meilisearch',

        'unreachable'       => 'Could not reach :eol :url',
        'unreachable-short' => 'Unreachable',

        'not-respond'       => 'Did not get a response from :url',
        'not-respond-short' => 'Did not respond',

        'invalid-response'       => 'The response did not contain a `status` key.',
        'invalid-response-short' => 'Invalid response',

        'available'         => 'The health check returned a status `:status`.',
        'available-short'   => ':status',

        'ok'                => 'OK. Service status: `:status`.',
        'ok-short'          => ':status',
    ],

    'ping' => [
        'label'        => 'Ping URL',
        'url_not_set'  => 'When using the `PingCheck` you must call `url` to pass the URL you want to ping.',

        'ok'           => 'Success ping: :url',
        'ok-short'     => 'Reachable :url',

        'failed'       => 'Failed ping: :url',
        'failed-short' => 'Unreachable :url',
    ],

    'schedule' => [
        'label'               => 'Scheduler',
        'ok'                  => 'OK',
        'warning_maintenance' => 'In maintenance mode is scheduler automatic deactivated',
        'failed'              => 'The schedule did not run yet.',
        'failed_time'         => 'The last run of the schedule :eol was more than :minutes minutes ago.',
    ],

    'disk_space' => [
        'label'        => 'Used disc space',
        'short'        => ':diskSpaceUsedPercentage%',
        'crashed'      => 'Disc space control failed',
        'ok'           => ':diskSpaceUsedPercentage% used :eol (:usedDiskSpace from :totalDiskSpace).',
        'warning'      => 'The disk slowly fills up. :eol Used :diskSpaceUsedPercentage% (:usedDiskSpace used out of :totalDiskSpace).',
        'failed'       => 'The disk is almost full. :eol Used :diskSpaceUsedPercentage% (:freeDiskSpace free out of :totalDiskSpace).',
    ],

    'route_cached' => [
        'label'        => 'Route cache',
        'ok'           => 'OK',
        'failed'       => 'The routes should be cached :eol in production for performance.',
    ],

    'config_cached' => [
        'label'        => 'Config cache',
        'ok'           => 'OK',
        'failed'       => 'The configuration should be cached :eol in production for better performance.',
    ],

    'event_cached' => [
        'label'        => 'Event cache',
        'ok'           => 'OK',
        'failed'       => 'The events should be cached :eol in production for performance.',
    ],

    'storage_link' => [
        'label'        => 'Symlink `storage`',
        'ok'           => 'OK',
        'failed'       => 'The `storage` directory is not linked.',
    ],

    'env_exists' => [
        'label'        => 'File .env',
        'ok'           => 'Exist',
        'failed'       => 'The .env file does not exist.',
    ],

    'php_version' => [
        'label'          => 'Version php',
        'ok'             => 'Min version: :required, used: :used',
        'failed'         => 'Required PHP version is not installed. :eol Required: :required, Used: :used',
        'crash_composer' => 'Failed to load required value from composer.json. :eol Used PHP: :used',
    ],

    'actual_composer_dependencies' => [
        'label'        => 'Packages `composer`.',
        'ok'           => 'All packages are up to date.',
        'failed'       => 'The composer dependencies are not up to date. :eol Call `composer install` to update them.',
    ],

    'app_key_set' => [
        'label'        => 'Application key (APP_KEY)',
        'ok'           => 'OK. Is set.',
        'failed'       => 'The APP_KEY is not set. Call `php artisan key:generate` to set one."',
    ],

    'ssl_certificate' => [
        'label'                        => 'SSL certificate',

        'failed-bad-url'               => 'Invalid URL. :eol :url',
        'failed-certificate-non-exist' => 'Certificate does not exist. :eol :url',
        'failed_uncovered_host'        => 'The certificate does not cover the host of this site. :eol Required HOST: :host',
        'failed_expired_soon'          => 'Certificate for :host at :daysRemaining days expires.',
        'failed-expired'               => 'Certificate for :host expired on :dateExpiration.',

        'ok'                           => 'Certificate is OK. :eol Expires on :dateExpiration (in :daysRemaining days).',
        'short'                        => 'Expiration of the day: :dateExpiration',
    ],

    'csp_enabled' => [
        'label'        => 'Content Security Policy',
        'ok'           => 'Is allowed' ,
        'failed'       => 'Forbidden. Possible application threat.',
    ],

    'queue_work' => [
        'label'        => 'Queue service',
        'ok'           => 'It works',
        'failed'       => 'Does not work. :eol Some services will not work properly.',
    ],

    'static_pages' => [
        'label'      => 'Site availability',
        'ok'         => 'All :allPages site is available. :eol Last check :lastCrawlDate.',
        'short'      => ':checkPages from :allPages',
        'failed'     => 'Only available :checkPages from :allPages site. :eol Last check :lastCrawlDate',
        'no-crawled' => 'Site availability has not been checked yet. :eol Last check :lastCrawlDate',
    ],

    'maintenance' => [
        'label'        => 'Manitenance mode',
        'ok'           => 'Not active',

        'failed-short'        => 'Active',
        'failed'              => 'Active with key: :eol :secret',
        'failed-no-key'       => 'Active without secret key.',
    ],
];
