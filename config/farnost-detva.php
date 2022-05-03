<?php

return [
    // TODO: declare mails in .env
    'mail_contact_form' => 'detva@fara.sk',

    'guery_loging' => env('QUERY_LOG', false),

    'google_api_key' => env('GOOGLE_MAP_API_KEY'),

    'ngrok_url' => env('NGROK_URL'),

    'cache_duration' => [
        'news' => env('CACHE_DURATION_NEWS', 60*60*24),   // 24 hodín
    ],
    'preppend_route_static_pages' => 'frontend',

    /**
     * When crawling your site, we will not follow any of these links.
     * You may use `*` as a wildcard.
     */
    'do_not_crawl_urls' => [
        '/login',
        '/register',
        '/admin/*',
        '/media/*',
        '/hladat/*',
        '/clanky-z-roku/*',
        '/clanky-podla-autora/*',
        '/clanky-v-kategorii/*',
        '/clanky-podla-klucoveho-slova/*',
    ],

];
