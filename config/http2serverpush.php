<?php


return [
    'size_limit' => '12000', // in bytes
    'base_path' => config('app.url') .'/',
    'exclude_keywords' => [
        'site.webmanifest',
    ]
];
