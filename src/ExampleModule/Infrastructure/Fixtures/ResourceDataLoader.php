<?php

declare(strict_types=1);

namespace App\ExampleModule\Infrastructure\Fixtures;

use App\ExampleModule\Domain\Resource\Create\ResourceCreateCommand;
use App\ExampleModule\Domain\Resource\Create\ResourceCreatorInterface;

class ResourceDataLoader // TODO implements fixture loader interface
{
    public function __construct(
        private readonly ResourceCreatorInterface $resourceCreator,
    ) {
    }

    public function load(): void
    {
        $data = require __DIR__.'/resource_data.php';

        foreach ($data as $createData) {
            $createCommand = new ResourceCreateCommand(
                $createData['name'],
                $createData['value'],
                $createData['id'] ?? null,
            );

            $resource = $this->resourceCreator->handle($createCommand);
        }
    }
}