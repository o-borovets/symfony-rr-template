<?php

namespace App\ExampleModule\Cli;

use App\ExampleModule\Infrastructure\Fixtures\ResourceDataLoader;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('example:resource:fixtures')]
class LoadFixtureCommand extends Command
{
    public function __construct(private readonly ResourceDataLoader $dataLoader)
    {
        parent::__construct();
    }

    public function run(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Loading resources');

        try {
            $this->dataLoader->load();
        } catch (\Throwable $throwable) {
            $output->writeln(['Error occurs:', $throwable->getMessage()]);
        }

        $output->writeln('Resource successfully loaded');

        return Command::SUCCESS;
    }
}
