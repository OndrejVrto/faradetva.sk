<?php declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use RectorLaravel\Set\LaravelSetList;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Arguments\Rector\ClassMethod\ArgumentAdderRector;
use Rector\CodeQuality\Rector\FuncCall\CompactToVariablesRector;
use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        // __DIR__ . '/app',
        // __DIR__ . '/app/Enums',
        // __DIR__ . '/app/Exceptions',
        // __DIR__ . '/app/Facades',
        __DIR__ . '/app/Services',
    ]);

    // define sets of rules
    $rectorConfig->sets([
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::EARLY_RETURN,
        SetList::TYPE_DECLARATION_STRICT,
        LevelSetList::UP_TO_PHP_82,

        LaravelSetList::LARAVEL_90,
        LaravelSetList::LARAVEL_CODE_QUALITY,
        // LaravelSetList::LARAVEL_STATIC_TO_INJECTION,
        // LaravelSetList::LARAVEL_ARRAY_STR_FUNCTION_TO_STATIC_CALL,
        // LaravelSetList::LARAVEL_LEGACY_FACTORIES_TO_CLASSES,
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
        __DIR__ . '/app/Overrides/*',
    ]);

    $rectorConfig->indent(' ', 4);
};
