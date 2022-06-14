<?php

return [
    'mail_contact_form' => env('MAIL_FROM_ADDRESS_CONTACT', 'kontaktny-formular@faradetva.sk'),

    'value_store'  => [
        'config'       => storage_path('app\value-store\config.json'),
        'crawler'      => storage_path('app\value-store\crawler.json'),
        'health-checks' => storage_path('app\value-store\health-checks.json'),
    ],

    'guery_loging' => env('QUERY_LOG', false),

    'google_api_key' => env('GOOGLE_MAP_API_KEY'),

    'ngrok_url' => env('NGROK_URL'),

    'preppend_route_static_pages' => 'web.custom',

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
