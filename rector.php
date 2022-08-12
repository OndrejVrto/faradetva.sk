<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\Laravel\Set\LaravelSetList;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Arguments\Rector\ClassMethod\ArgumentAdderRector;
use Rector\CodeQuality\Rector\FuncCall\CompactToVariablesRector;
use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/app',
        // __DIR__ . '/app/Enums',
        // __DIR__ . '/app/Exceptions',
        // __DIR__ . '/app/Facades',
    ]);

    // define sets of rules
    $rectorConfig->sets([
        SetList::CODE_QUALITY,
        LevelSetList::UP_TO_PHP_81,
        LaravelSetList::LARAVEL_90
    ]);

    // $rectorConfig->phpstanConfig(__DIR__ . '/phpstan.neon');

    $rectorConfig->phpVersion(PhpVersion::PHP_81);

    // register a single rule
    $rectorConfig->rule(
        InlineConstructorDefaultToPropertyRector::class
    );

    $rectorConfig->skip([
        ArgumentAdderRector::class,
        CompactToVariablesRector::class,
        //skip single file
        __DIR__ . '/app/Http/Helpers/BeautifyHtml.php',
        __DIR__ . '/app/Services/Dashboard/FutureTestService.php',
        //skip directory
        __DIR__ . '/app/Overides/*',
    ]);
};
