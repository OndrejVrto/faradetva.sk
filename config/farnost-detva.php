<?php

return [
    // TODO: declare mails in .env
    'mail-contact-form' => 'detva@fara.sk',

    'guery-loging' => env('QUERY_LOG', false),

    'google-api-key' => env('GOOGLE_MAP_API_KEY'),

    'ngrok_url' => env('NGROK_URL'),

    'cache-duration' => [
        'news' => env('CACHE_DURATION_NEWS', 60*60*24),   // 24 hodín
    ],
    'preppend_route_static_pages' => 'frontend',
];
