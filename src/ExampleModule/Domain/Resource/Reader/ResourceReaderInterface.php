<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Reader;

interface ResourceReaderInterface
{
    public function handle(ResourceReaderQuery $query): ResourceReaderResponse;
}
