<?php

return [

    /**
     * Here you can specify which directories need to be cleanup. All files older than
     * the specified amount of minutes will be deleted.
     */
    'directories' => [
        storage_path('tmp/uploads') => [
            'deleteAllOlderThanMinutes' => 60 * 24 * 1,  // One day
        ],

        storage_path('media-library/temp') => [
            'deleteAllOlderThanMinutes' => 60 * 24 * 1,  // One day
        ],

        storage_path('debugbar') => [
            'deleteAllOlderThanMinutes' => 60 * 24 * 1,  // One day
        ],

        // old data cache if is storage as file
        storage_path('logs') => [
            'deleteAllOlderThanMinutes' => 60 * 24 * 31,  // 31 days
        ],

        // old data cache if is storage as file
        storage_path('framework/cache') => [
            'deleteAllOlderThanMinutes' => 60 * 24 * 7,  // 7 days
        ],

        // meilisearch old indexes
        //! synchronize clearing with SiteSearchCrawlJob schedule
        base_path('data.ms/indexes') => [
            'deleteAllOlderThanMinutes' => 60 * 24 * 1,  // One day
        ],
    ],

    /**
     * If a file is older than the amount of minutes specified, a cleanup policy will decide if that file
     * should be deleted. By default every file that is older than the specified amount of minutes
     * will be deleted.
     *
     * You can customize this behaviour by writing your own clean up policy. A valid policy
     * is any class that implements `Spatie\DirectoryCleanup\Policies\CleanupPolicy`.
     */
    // 'cleanup_policy' => \Spatie\DirectoryCleanup\Policies\DeleteEverything::class,
    'cleanup_policy' => \App\Policies\CleanupPolicies\MyCustomCleanupPolicy::class,
];
