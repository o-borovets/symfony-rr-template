<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Reader;

use App\ExampleModule\Domain\Resource\Resource;

final readonly class ResourceReaderResponseItem
{
    public function __construct(
        public string $id,
        public string $name,
        public string $value
    )
    {
    }

    public static function fromResource(Resource $resource): self
    {
        return new self(
            $resource->getId()->toRfc4122(),
            $resource->getName(),
            $resource->getValue(),
        );
    }
}
