<?php

declare(strict_types=1);

namespace App\ExampleModule\Infrastructure\Repository;

use App\ExampleModule\Domain\Resource\Exception\ResourceAlreadyExist;
use App\ExampleModule\Domain\Resource\Resource;
use App\ExampleModule\Domain\Resource\ResourceRepositoryInterface;

class MemoryRepository implements ResourceRepositoryInterface
{
    /** @var array<string, resource> */
    private array $resources = [];

    public function __construct(
    ) {
        if (file_exists('/tmp/resuorce-dump.sphp')) {
            // @phpstan-ignore-next-line
            $this->resources = unserialize(file_get_contents('/tmp/resuorce-dump.sphp'));
        }
    }

    public function __destruct()
    {
        file_put_contents(
            '/tmp/resuorce-dump.sphp',
            serialize($this->resources),
        );
    }

    public function get(string $id): Resource
    {
        return $this->resources[$id] ?? throw new \RuntimeException('Resource not found');
    }

    public function put(Resource $resource): void
    {
        $id = $resource->getId();

        if (\array_key_exists($id, $this->resources)) {
            throw new ResourceAlreadyExist($id);
        }

        $this->resources[$id] = $resource;
    }

    /** @return array<string, resource> */
    public function find(): array
    {
        // TODO: Implement find() method.
        return $this->resources;
    }
}
