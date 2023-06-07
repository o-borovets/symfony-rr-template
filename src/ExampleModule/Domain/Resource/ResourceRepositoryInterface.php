<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource;

use Symfony\Component\Uid\Uuid;
use App\ExampleModule\Domain\Resource\Resource as ResourceEntity;

interface ResourceRepositoryInterface
{
    public function get(Uuid $id): ResourceEntity;

    public function put(ResourceEntity $resource): void;

    /** @return array<string, ResourceEntity> */
    public function find(): array;
}
