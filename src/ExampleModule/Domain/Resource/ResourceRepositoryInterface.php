<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource;

use App\ExampleModule\Domain\Resource\Exception\ResourceNotFound;
use App\ExampleModule\Domain\Resource\Resource as ResourceEntity;
use Symfony\Component\Uid\Uuid;

interface ResourceRepositoryInterface
{
    /**
     * @throws ResourceNotFound
     */
    public function get(Uuid $id): ResourceEntity;

    public function put(ResourceEntity $resource): void;

    /** @return array<string, ResourceEntity> */
    public function find(): array;
}
