<?php

use Rector\Config\RectorConfig;
use Rector\Core\Configuration\Option;
use Rector\Php81\Rector\Property\ReadOnlyPropertyRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return function (RectorConfig $rectorConfig) {
    $rectorConfig->parallel();
    $rectorConfig->importNames();
    $rectorConfig->importShortClasses(false);

    $rectorConfig->parameters()->set(Option::APPLY_AUTO_IMPORT_NAMES_ON_CHANGED_FILES_ONLY, true);

    $rectorConfig->cacheDirectory(__DIR__ . '/var/rector');

    $rectorConfig->phpstanConfig(__DIR__ . '/phpstan.neon.dist');

    $rectorConfig->paths([
        __DIR__ . '/src',
        //__DIR__.'/tests',
    ]);

    $rectorConfig->sets([
        SetList::TYPE_DECLARATION,
        SetList::CODE_QUALITY,
        SetList::EARLY_RETURN,
        LevelSetList::UP_TO_PHP_81,
    ]);

    $rectorConfig->skip([
    ]);
};
