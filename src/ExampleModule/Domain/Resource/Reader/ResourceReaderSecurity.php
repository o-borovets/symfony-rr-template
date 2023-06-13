<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Reader;

use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\Uid\Uuid;

#[AsDecorator(ResourceReaderInterface::class)]
class ResourceReaderSecurity implements ResourceReaderInterface
{
    public function __construct(private readonly ResourceReaderInterface $decorated)
    {
    }

    public function list(ResourceReaderQuery $query): ResourceReaderResponse
    {
        return $this->decorated->list($query);
    }

    public function one(Uuid $id): ResourceDetailsResponse
    {
        return $this->decorated->one($id);
    }
}
