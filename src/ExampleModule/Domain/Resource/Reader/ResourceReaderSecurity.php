<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Reader;

use Symfony\Component\DependencyInjection\Attribute\AsDecorator;

#[AsDecorator(ResourceReaderInterface::class)]
class ResourceReaderSecurity implements ResourceReaderInterface
{
    public function __construct(private readonly ResourceReaderInterface $decorated)
    {
    }

    public function handle(ResourceReaderQuery $query): ResourceReaderResponse
    {
        return $this->decorated->handle($query);
    }
}
