<?php

declare(strict_types=1);

namespace App\ExampleModule\Infrastructure\Repository;

use App\ExampleModule\Domain\Resource\Exception\ResourceAlreadyExist;
use App\ExampleModule\Domain\Resource\Resource as ResourceEntity;
use App\ExampleModule\Domain\Resource\ResourceRepositoryInterface;
use Symfony\Component\Uid\Uuid;

class MemoryRepository implements ResourceRepositoryInterface
{
    /** @var array<string, ResourceEntity> */
    private array $resources = [];

    /**
     * @psalm-suppress MixedAssignment
     */
    public function __construct(
    ) {
        if (file_exists('/tmp/resuorce-dump.sphp')) {
            $this->resources = unserialize(file_get_contents('/tmp/resuorce-dump.sphp')); // @phpstan-ignore-line
        }
    }

    public function __destruct()
    {
        file_put_contents(
            '/tmp/resuorce-dump.sphp',
            serialize($this->resources),
        );
    }

    public function get(Uuid $id): ResourceEntity
    {
        return $this->resources[$id->toRfc4122()] ?? throw new \RuntimeException('Resource not found');
    }

    public function put(ResourceEntity $resource): void
    {
        $id = $resource->getId();

        if (\array_key_exists($id->toRfc4122(), $this->resources)) {
            throw new ResourceAlreadyExist($id);
        }

        $this->resources[$id->toRfc4122()] = $resource;
    }

    /** @return array<string, ResourceEntity> */
    public function find(): array
    {
        // TODO: Implement find() method.
        return $this->resources;
    }
}
