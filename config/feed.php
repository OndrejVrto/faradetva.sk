<?php

return [
    'feeds' => [
        'notices-rss' => [
            /**
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * [App\Model::class, 'getAllFeedItems']
             *
             * You can also pass an argument to that method. Note that their key must be the name of the parameter:
             * [App\Model::class, 'getAllFeedItems', 'parameterName' => 'argument']
             */
            'items' => ['App\Models\Notice', 'getFeedItems'],

            /**
             * The feed will be available on this url.
             */
            'url' => '/feed-notices-rss',

            'title' => 'Farské oznamy Detva',
            'description' => 'Všetky oznamy farnosti Detva.',
            'language' => 'sk-SK',

            /**
             * The image to display for the feed. For Atom feeds, this is displayed as
             * a banner/logo; for RSS and JSON feeds, it's displayed as an icon.
             * An empty value omits the image attribute from the feed.
             */
            'image' => config('app.url').'/images/logo/logo-farnosti-detva.png',

            /**
             * The format of the feed. Acceptable values are 'rss', 'atom', or 'json'.
             */
            'format' => 'rss',

            /**
             * The view that will render the feed.
             */
            'view' => 'feed::rss',

            /**
             * The mime type to be used in the <link> tag. Set to an empty string to automatically
             * determine the correct value.
             */
            'type' => '',

            /**
             * The content type for the feed response. Set to an empty string to automatically
             * determine the correct value.
             */
            'contentType' => '',
        ],
        'notices-atom' => [
            'items'       => ['App\Models\Notice', 'getFeedItems'],
            'url'         => '/feed-notices-atom',
            'title'       => 'Farské oznamy Detva',
            'description' => 'Všetky oznamy farnosti Detva.',
            'language'    => 'sk-SK',
            'image'       => config('app.url').'/images/logo/logo-farnosti-detva.png',
            'format'      => 'atom',
            'view'        => 'feed::atom',
        ],
        'notices-json' => [
            'items'       => ['App\Models\Notice', 'getFeedItems'],
            'url'         => '/feed-notices-json',
            'title'       => 'Farské oznamy Detva',
            'description' => 'Všetky oznamy farnosti Detva.',
            'language'    => 'sk-SK',
            'image'       => config('app.url').'/images/logo/logo-farnosti-detva.png',
            'format'      => 'json',
            'view'        => 'feed::json',
        ],

        'articles-rss' => [
            'items'       => ['App\Models\News', 'getFeedItems'],
            'url'         => '/feed-articles-rss',
            'title'       => 'Aktuality farnosti Detva',
            'description' => 'Všetky články z webovej stránky farnosti Detva.',
            'language'    => 'sk-SK',
            'image'       => config('app.url').'/images/logo/logo-farnosti-detva.png',
            'format'      => 'rss',
            'view'        => 'feed::rss',
        ],
        'articles-atom' => [
            'items'       => ['App\Models\News', 'getFeedItems'],
            'url'         => '/feed-articles-atom',
            'title'       => 'Aktuality farnosti Detva',
            'description' => 'Všetky články z webovej stránky farnosti Detva.',
            'language'    => 'sk-SK',
            'image'       => config('app.url').'/images/logo/logo-farnosti-detva.png',
            'format'      => 'atom',
            'view'        => 'feed::atom',
        ],
        'articles-json' => [
            'items'       => ['App\Models\News', 'getFeedItems'],
            'url'         => '/feed-articles-json',
            'title'       => 'Aktuality farnosti Detva',
            'description' => 'Všetky články z webovej stránky farnosti Detva.',
            'language'    => 'sk-SK',
            'image'       => config('app.url').'/images/logo/logo-farnosti-detva.png',
            'format'      => 'json',
            'view'        => 'feed::json',
        ],
    ],
];
