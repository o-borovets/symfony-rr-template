<?php

use Rector\CodeQuality\Rector\Class_\CompleteDynamicPropertiesRector;
use Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector;
use Rector\Config\RectorConfig;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\Php81\Rector\Property\ReadOnlyPropertyRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;

return function (RectorConfig $rectorConfig) {
    $rectorConfig->parallel();
    $rectorConfig->importNames(true, false);
    $rectorConfig->importShortClasses(false);

    $rectorConfig->cacheDirectory(__DIR__ . '/var/rector');

    $rectorConfig->phpstanConfig(__DIR__ . '/phpstan.neon.dist');

    $rectorConfig->paths([
        __DIR__ . '/src',
        //__DIR__.'/tests',
    ]);

    $rectorConfig->sets([
        SetList::TYPE_DECLARATION,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::DEAD_CODE,
        SetList::EARLY_RETURN,
        LevelSetList::UP_TO_PHP_82,
    ]);

    $rectorConfig->rule(DeclareStrictTypesRector::class);

    $rectorConfig->skip([
        CompleteDynamicPropertiesRector::class => [
            __DIR__ . 'src/System/Infrastructure/HealthCheck/services.php:1',
        ],
        EncapsedStringsToSprintfRector::class,
        ClassPropertyAssignToConstructorPromotionRector::class,
        ReadOnlyPropertyRector::class,
    ]);
};
