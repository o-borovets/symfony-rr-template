<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Create;

use App\ExampleModule\Domain\Resource\Resource;
use App\ExampleModule\Domain\Resource\ResourceRepositoryInterface;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\Uid\Factory\UuidFactory;

#[AsAlias]
class ResourceCreator implements ResourceCreatorInterface
{
    public function __construct(
        private readonly ResourceRepositoryInterface $repository,
        private readonly UuidFactory $uuidFactory,
    ) {
    }

    public function handle(ResourceCreateCommand $createData): Resource
    {
        $resource = new Resource(
            $createData->id ?? $this->uuidFactory->create(),
            $createData->name,
            $createData->value,
        );

        $this->repository->put($resource);

        // raise events and other logic

        return $resource;
    }
}
