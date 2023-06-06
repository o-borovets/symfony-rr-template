<?php

declare(strict_types=1);

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routes) : void {
    $routes->import(
        // PSR-4 loader commented since it ignores exclude rules
        // TODO find a way to use PSR-4 loader
        // ['path' => './', 'namespace' => 'App\ExampleModule\Api\\'],
        './',
        'attribute',
        exclude: [
            '**/routes.php',
            '**/*Request*',
            '**/*Response*',
            '**/*services*',
        ]
    );
};
