<?php

declare(strict_types=1);

namespace App\ExampleModule\Infrastructure\Fixtures;

use App\ExampleModule\Domain\Resource\Create\ResourceCreateCommand;
use App\ExampleModule\Domain\Resource\Create\ResourceCreatorInterface;
use Symfony\Component\Uid\Uuid;

class ResourceDataLoader // TODO implements fixture loader interface
{
    public function __construct(
        private readonly ResourceCreatorInterface $resourceCreator,
    ) {
    }

    public function load(): void
    {
        $data = require __DIR__ . '/resource_data.php';

        foreach ($data as $createData) {
            $createCommand = new ResourceCreateCommand(
                $createData['name'],
                $createData['value'],
                $createData['id'] ?? Uuid::v7(),
            );

            $this->resourceCreator->handle($createCommand);
        }
    }
}
