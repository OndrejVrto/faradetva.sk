<?php

return [
    'cache' => [
        'label'       => 'Cache',
        'ok'          => 'OK',
        'failed'      => 'Could not set or retrieve an application cache value. Used driver: `:driver`.',
        'exception'   => 'An exception occurred with the application cache: `:exceptionMessage`. Used driver: `:driver`.',
    ],

    'cache_response' => [
        'label'       => 'Cache response',
        'ok'          => 'OK',
        'failed'      => 'Cache response turn off. Used driver: `:driver`.',
        'exception'   => 'Exception occurred: `:exceptionMessage`. Used driver: `:driver`.',
    ],

    'database_connection' => [
        'label'       => 'Database connection',
        'ok'          => 'OK',
        'exception'   => 'Could not connect to the database: `:exceptionMessage`. Used connection: `:connection_name`.',
    ],

    'debug_mode' => [
        'label'       => 'Debug mode',
        'ok'          => 'OK. Is off.',
        'failed'      => 'Still running.',
    ],

    'environment' => [
        'label'       => 'Environment',
        'ok'          => 'It is currently set to: `:actual`.',
        'failed'      => 'Required: `:expected`, but actually was: `:actual`.',
    ],

    'meili-search' => [
        'label'             => 'Meilisearch',

        'unreachable'       => 'Could not reach :url.',
        'unreachable-short' => 'Unreachable',

        'not-respond'       => 'Did not get a response from :url.',
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
        'ok-short'     => 'Reachable :name',

        'failed'       => 'Failed ping: :url',
        'failed-short' => 'Unreachable :name',
    ],

    'schedule' => [
        'label'        => 'Scheduler',
        'ok'           => 'OK',
        'failed'       => 'The schedule did not run yet.',
        'failed_time'  => 'The last run of the schedule was more than :minutes minutes ago.',
    ],

    'disk_space' => [
        'label'       => 'Used disc space',
        'short'        => ':diskSpaceUsedPercentage%',
        'ok'           => ':diskSpaceUsedPercentage% used (:usedDiskSpace from :totalDiskSpace).',
        'warning'      => 'The disk slowly fills up. Used :diskSpaceUsedPercentage% (:usedDiskSpace used out of :totalDiskSpace).',
        'failed'       => 'The disk is almost full. Used :diskSpaceUsedPercentage% (:freeDiskSpace free out of :totalDiskSpace).',
    ],
];
