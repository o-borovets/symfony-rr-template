<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Reader;

use Symfony\Component\Uid\Uuid;

interface ResourceReaderInterface
{
    public function list(ResourceReaderQuery $query): ResourceReaderResponse;

    public function one(Uuid $id): ResourceDetailsResponse;
}
