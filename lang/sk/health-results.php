<?php

return [

    // global short answer
    'ok'      => 'OK',
    'warning' => 'Varovanie',
    'failed'  => 'Chyba',

    'cache' => [
        'label'       => 'Vyrovnávacia pamäť (cache)',
        'ok'          => 'Funguje',
        'failed'      => 'Nepodarilo sa nastaviť alebo načítať hodnotu vyrovnávacej pamäte aplikácie. :eol Použitý ovládač: `:driver`.',
        'exception'   => 'Nastala výnimka s vyrovnávacou pamäťou aplikácie: `:exceptionMessage`. :eol Použitý ovládač: `:driver`.',
    ],

    'cache_response' => [
        'label'       => 'Ukladanie stránok (cache response)',
        'ok'          => 'Funguje',
        'failed'      => 'Ukladanie stránok je vypnuté.:eol Použitý ovládač: `:driver`.',
        'exception'   => 'Nastala výnimka: `:exceptionMessage`. :eol Použitý ovládač: `:driver`.',
    ],

    'database_connection' => [
        'label'       => 'Pripojenie k databáze',
        'ok'          => 'Funguje',
        'exception'   => 'Nepodarilo sa pripojiť k databáze: `:exceptionMessage`. :eol Použité pripojenie: `:connection_name`.',
    ],

    'debug_mode' => [
        'label'       => 'Režim ladenia (debug mode)',
        'ok'          => 'Je vypnutý.',
        'failed'      => 'Stále beží.',
    ],

    'environment' => [
        'label'       => 'Prostredie (environment)',
        'ok'          => 'Aktuálne nastavené na: `:actual`.',
        'failed'      => 'Požadované: `:expected`, :eol ale nastavené je: `:actual`.',
    ],

    'meili-search' => [
        'label'             => 'Dostupnosť služby Meilisearch',

        'unreachable'       => 'Nepodarilo sa dosiahnúť službu :eol :url',
        'unreachable-short' => 'Nedosiahnuteľná služba',

        'not-respond'       => 'Neprišla odpoveď od :url',
        'not-respond-short' => 'Bez odpovede',

        'invalid-response'       => 'Odpoveď neobsahuje kľúč: `status`.',
        'invalid-response-short' => 'Nesprávna odpoveď',

        'available'         => 'Kontrola stavu vrátila stav: `:status`.',
        'available-short'   => ':status',

        'ok'                => 'Funguje. Stav služby: `:status`.',
        'ok-short'          => ':status',
    ],

    'ping' => [
        'label'        => 'Ping URL adresy',
        'url_not_set'  => 'URL adresa nieje nastavená.',

        'ok'           => 'Úspešný ping: :url',
        'ok-short'     => 'Funguje ( :url )',

        'failed'       => 'Ping zlyhal: :url',
        'failed-short' => 'Zlyhalo ( :url )',
    ],

    'schedule' => [
        'label'        => 'Plánovač',
        'ok'           => 'Funguje',
        'failed'       => 'Plánovač nieje spustený.',
        'failed_time'  => 'Posledný beh plánovača bol :eol pred viac ako :minutes minútami.',
    ],

    'disk_space' => [
        'label'        => 'Zaplnenie disku',
        'short'        => ':diskSpaceUsedPercentage%',
        'ok'           => ':diskSpaceUsedPercentage% zaplnených :eol (:usedDiskSpace z :totalDiskSpace).',
        'warning'      => 'Disk sa pomaly zapĺňa. :eol Použitých :diskSpaceUsedPercentage% (:usedDiskSpace použitých z :totalDiskSpace).',
        'failed'       => 'Disk je skoro plný. :eol Použitých :diskSpaceUsedPercentage% (:freeDiskSpace voľných z :totalDiskSpace).',
    ],

    'route_cached' => [
        'label'        => 'Route cache',
        'ok'           => 'OK',
        'failed'       => 'Cesty by sa mali ukladať do vyrovnávacej pamäte,:eol aby sa dosiahol lepší výkon stránky.',
    ],

    'config_cached' => [
        'label'        => 'Config cache',
        'ok'           => 'OK',
        'failed'       => 'Konfigurácie by sa mali ukladať do vyrovnávacej pamäte,:eol aby sa dosiahol lepší výkon stránky.',
    ],

    'event_cached' => [
        'label'        => 'Event cache',
        'ok'           => 'OK',
        'failed'       => 'Udalosti by sa mali ukladať do vyrovnávacej pamäte,:eol aby sa dosiahol lepší výkon stránky.',
    ],

    'storage_link' => [
        'label'        => 'Symbolický link `storage`',
        'ok'           => 'Funguje',
        'failed'       => 'Adresár `storage` nieje aktivovaný.',
    ],

    'env_exists' => [
        'label'        => 'Súbor s nastaveniami (.env)',
        'ok'           => 'Existuje',
        'failed'       => 'Súbor .env neexistuje.',
    ],

    'php_version' => [
        'label'          => 'Verzia php',
        'ok'             => 'Minimálne požadovaná verzia: :required, použitá: :used',
        'failed'         => 'Požadovaná verzia PHP nieje nainštalovaná. :eol Minimálne požadovaná: :required, použitá: :used',
        'crash_composer' => 'Nepodarilo sa načítať požadovanú hodnotu z composer.json. :eol Použitá verzia PHP: :used',
    ],

    'actual_composer_dependencies' => [
        'label'        => 'Rozširujúce balíčky `composer`.',
        'ok'           => 'Všetky balíčky sú aktuálne.',
        'failed'       => 'Balíčky `composer` a ich závislosti nie sú aktuálne. :eol Zavolaj `composer install` pre aktualizáciu.',
    ],

    'app_key_set' => [
        'label'        => 'Hlavný kľúč (APP_KEY)',
        'ok'           => 'OK. Je nastavený',
        'failed'       => 'Kľúč APP_KEY nieje nastavený. :eol Pre vytvorenie zavolaj `php artisan key:generate`."',
    ],

    'ssl_certificate' => [
        'label'                        => 'SSL certifikát',

        'failed-bad-url'               => 'Neplatná adresa URL. :eol :url',
        'failed-certificate-non-exist' => 'Certifikát neexistuje. :eol :url',
        'failed_uncovered_host'        => 'Certifikát nepokrýva hostiteľa tejto stránky. :eol Požadovaný HOST: :host',
        'failed_expired_soon'          => 'Certifikát pre :host o :daysRemaining dní expiruje.',
        'failed-expired'               => 'Certifikát pre :host expiroval dňa :dateExpiration.',

        'ok'                           => 'Certifikát je v poriadku. :eol Expiruje dňa :dateExpiration (o :daysRemaining dní).',
        'short'                        => 'Expirácia dňa: :dateExpiration',
    ],

    'csp_enabled' => [
        'label'        => 'Content Security Policy',
        'ok'           => 'Je povolené',
        'failed'       => 'Zakázané. Možné ohrozenie aplikácie.',
    ],

    'queue_work' => [
        'label'        => 'Služba Queue',
        'ok'           => 'Funguje',
        'failed'       => 'Nefunguje. :eol Niektoré služby nebudú pracovať správne.',
    ],

    'static_pages' => [
        'label'      => 'Dostupnosť stránok',
        'ok'         => 'Všetkých :allPages stránok je dostupných. :eol Posledná kontrola :lastCrawlDate.',
        'short'      => ':checkPages z :allPages',
        'failed'     => 'Dostupných je len :checkPages zo :allPages stránok. :eol Posledná kontrola :lastCrawlDate',
        'no-crawled' => 'Dostupnosť stránok zatiaľ nebola kontrolovaná. :eol Posledná kontrola :lastCrawlDate',
    ],
];
