<?php

declare(strict_types=1);

namespace App\System\Infrastructure\Symfony;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait {
        configureContainer as baseConfigureContainer;
        configureRoutes as baseConfigureRoutes;
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $this->baseConfigureRoutes($routes);

        $routes->import($this->getProjectDir() . '/src/**/{routes}.{yaml,php}', 'glob');
    }

    protected function configureContainer(ContainerConfigurator $container, LoaderInterface $loader, ContainerBuilder $builder): void
    {
        $this->baseConfigureContainer($container, $loader, $builder);

        $loader->load($this->getProjectDir() . '/src/**/{services}.{yaml,php}', 'glob');
        $loader->load($this->getProjectDir() . "/src/**/{services_{$this->environment}}.{yaml,php}", 'glob');
    }
}
