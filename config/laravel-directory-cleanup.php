<?php

return [

    /**
     * Here you can specify which directories need to be cleanup. All files older than
     * the specified amount of minutes will be deleted.
     */
    'directories' => [
        storage_path('tmp/uploads') => [
            'deleteAllOlderThanMinutes' => 60 * 24,
        ],

        storage_path('media-library/temp') => [
            'deleteAllOlderThanMinutes' => 60 * 96,
        ],

        storage_path('debugbar') => [
            'deleteAllOlderThanMinutes' => 60 * 24,
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
