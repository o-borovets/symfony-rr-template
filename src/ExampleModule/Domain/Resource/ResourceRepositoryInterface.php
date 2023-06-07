<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource;

interface ResourceRepositoryInterface
{
    public function get(string $id): Resource;

    public function put(Resource $resource): void;

    public function find(): array;
}
