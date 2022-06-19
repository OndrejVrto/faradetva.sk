<?php

return [
    'feeds' => [
        'articles' => [
            /**
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * [App\Model::class, 'getAllFeedItems']
             *
             * You can also pass an argument to that method. Note that their key must be the name of the parameter:
             * [App\Model::class, 'getAllFeedItems', 'parameterName' => 'argument']
             */
            'items' => 'App\Models\News@getFeedItems',

            /**
             * The feed will be available on this url.
             */
            'url' => '/feed-articles',

            'title' => 'Články farnosti Detva',
            'description' => 'Všetky články z webovej stránky farnosti Detva.',
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
            'format' => 'json',

            /**
             * The view that will render the feed.
             */
            'view' => 'feed::json',

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
        'notices' => [
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
            'url' => '/feed-notices',

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
            'format' => 'json',

            /**
             * The view that will render the feed.
             */
            'view' => 'feed::json',

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
    ],
];
