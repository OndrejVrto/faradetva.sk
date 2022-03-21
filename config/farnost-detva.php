<?php

return [

    'guery-loging' => env('QUERY_LOG', false),

    'cache-duration' => [
        'news' => env('CACHE_DURATION_NEWS', 60*60*24),   // 24 hodín
    ],
    'preppend_route_static_pages' => 'frontend',

    'title' => 'Vitajte',
    'title_postfix' => ' | Farnosť Detva',

    'keywords' => 'farnosť, Detva, svadba, krst, oznamy, predmanželská príprava, pohreb',
    'description' => 'Webové stránky farnosťi Detva.',
];
