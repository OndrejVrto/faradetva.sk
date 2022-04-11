<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /**
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Farnosť Detva", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Webová stránka farnosťi Detva.', // set false to total remove
            'separator'    => ' | ',
            'keywords'     => ['farnosť Detva', 'fara', 'svadba', 'krst', 'pohreb', 'farské oznamy', 'omša', 'predmanželská príprava', 'kňaz', 'cirkev'],
            'canonical'    => 'current', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'index, follow', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /**
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /**
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Farnosť Detva', // set false to total remove
            'description' => 'Webová stránka farnosťi Detva.', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove   (https://developer.twitter.com/en/docs/twitter-for-websites/cards/overview/abouts-cards)
            'type'        => 'website',
            'site_name'   => 'faraDetva',
            'locale'      => 'sk-SK',
            "license"     => "https://creativecommons.org/licenses/by-nc-nd/4.0/",
        ],
    ],
    'twitter' => [
        /**
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary_large_image',    // “summary”, “summary_large_image”, “app”, or “player”.
            // 'site'        => '@faraDetva',
        ],
    ],
    'json-ld' => [
        /**
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'              => 'Farnosť Detva',                                                 // set false to total remove
            'description'        => 'Webová stránka farnosťi Detva.',                                // set false to total remove
            'url'                => 'full',                                                          // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'               => 'WebPage',
            "license"            => "https://creativecommons.org/licenses/by-nc-nd/4.0/legalcode",
            "acquireLicensePage" => "https://creativecommons.org/licenses/by-nc-nd/4.0/",
        ],
    ],
];
