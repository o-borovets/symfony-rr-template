<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Create;

use App\ExampleModule\Domain\Resource\Resource;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;

#[AsDecorator(ResourceCreatorInterface::class)]
class ResourceCreatorSecurity implements ResourceCreatorInterface
{
    public function __construct(private readonly ResourceCreatorInterface $resourceCreator)
    {
    }

    public function handle(ResourceCreateCommand $createData): Resource
    {
        // TODO implement security check

        return $this->resourceCreator->handle($createData);
    }
}
