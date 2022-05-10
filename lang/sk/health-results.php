<?php

return [
    'cache' => [
        'label'       => 'Vyrovnávacia pamäť (cache)',
        'ok'          => 'Funguje',
        'failed'      => 'Nepodarilo sa nastaviť alebo načítať hodnotu vyrovnávacej pamäte aplikácie. Použitý ovládač: `:driver`.',
        'exception'   => 'Nastala výnimka s vyrovnávacou pamäťou aplikácie: `:exceptionMessage`. Použitý ovládač: `:driver`.',
    ],

    'cache_response' => [
        'label'       => 'Ukladanie stránok (cache response)',
        'ok'          => 'Funguje',
        'failed'      => 'Ukladanie stránok je vypnuté. Použitý ovládač: `:driver`.',
        'exception'   => 'Nastala výnimka: `:exceptionMessage`. Použitý ovládač: `:driver`.',
    ],

    'database_connection' => [
        'label'       => 'Pripojenie k databáze',
        'ok'          => 'Funguje',
        'exception'   => 'Nepodarilo sa pripojiť k databáze: `:exceptionMessage`. Použité pripojenie: `:connection_name`.',
    ],

    'debug_mode' => [
        'label'       => 'Režim ladenia (debug mode)',
        'ok'          => 'Je vypnutý.',
        'failed'      => 'Je povolený.',
    ],

    'environment' => [
        'label'       => 'Pracovné prostredie (environment)',
        'ok'          => 'Nastavené na: `:actual`.',
        'failed'      => 'Požadované: `:expected`, ale nastavené je: `:actual`.',
    ],

    'meili-search' => [
        'label'             => 'Dostupnosť služby Meilisearch',

        'unreachable'       => 'Nepodarilo sa dosiahnúť službu :url.',
        'unreachable-short' => 'Nedosiahnuteľná služba',

        'not-respond'       => 'Neprišla odpoveď od :url.',
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
        'ok-short'     => 'Funguje (:name)',

        'failed'       => 'Ping zlyhal: :url',
        'failed-short' => 'Zlyhalo (:name)',
    ],

    'schedule' => [
        'label'        => 'Plánovač',
        'ok'           => 'Funguje',
        'failed'       => 'Plánovač nieje spustený.',
        'failed_time'  => 'Posledný beh plánovača bol pred viac ako :minutes minútami.',
    ],

    'disk_space' => [
        'label'        => 'Zaplnenie disku',
        'short'        => ':diskSpaceUsedPercentage%',
        'ok'           => ':diskSpaceUsedPercentage% zaplnených (:usedDiskSpace z :totalDiskSpace).',
        'warning'      => 'Disk sa pomaly zapĺňa. Použitých :diskSpaceUsedPercentage% (:usedDiskSpace použitých z :totalDiskSpace).',
        'failed'       => 'Disk je skoro plný. Použitých :diskSpaceUsedPercentage% (:freeDiskSpace voľných z :totalDiskSpace).',
    ],
];
