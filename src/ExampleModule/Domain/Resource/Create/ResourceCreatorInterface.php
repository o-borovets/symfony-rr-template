<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Create;

use App\ExampleModule\Domain\Resource\Resource;

interface ResourceCreatorInterface
{
    public function handle(ResourceCreateCommand $createData): Resource;
}
