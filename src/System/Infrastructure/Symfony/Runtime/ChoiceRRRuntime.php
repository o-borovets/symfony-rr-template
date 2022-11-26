<?php

namespace App\System\Infrastructure\Symfony\Runtime;

use Baldinof\RoadRunnerBundle\Runtime\Runtime;
use RoadRunnerTemporalSymfony\Runtime\TemporalRuntime;
use Spiral\RoadRunner\Environment\Mode;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Runtime\RunnerInterface;
use Symfony\Component\Runtime\SymfonyRuntime;

class ChoiceRRRuntime extends SymfonyRuntime
{
    public function getRunner(?object $application): RunnerInterface
    {
        if ($application instanceof KernelInterface && Mode::MODE_TEMPORAL === getenv('RR_MODE')) {
            return (new TemporalRuntime())->getRunner($application);
        }

        if ($application instanceof KernelInterface && Mode::MODE_HTTP === getenv('RR_MODE')) {
            return (new Runtime())->getRunner($application);
        }

        return parent::getRunner($application);
    }
}
