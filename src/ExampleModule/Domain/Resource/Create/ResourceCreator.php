<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Create;

use App\ExampleModule\Domain\Resource\Resource;
use App\ExampleModule\Domain\Resource\ResourceRepositoryInterface;

class ResourceCreator implements ResourceCreatorInterface
{
    public function __construct(
        private readonly ResourceRepositoryInterface $repository
    ) {
    }

    public function handle(ResourceCreateCommand $createData): Resource
    {
        $resource = new Resource(
            $createData->name,
            $createData->value,
            $createData->id,
        );

        $this->repository->put($resource);

        // raise events and other logic

        return $resource;
    }
}
