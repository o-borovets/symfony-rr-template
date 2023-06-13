<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Reader;

use App\ExampleModule\Domain\Resource\Resource as DomainResource;
use Symfony\Component\Uid\Uuid;

final readonly class ResourceReaderResponseItem
{
    public function __construct(
        public Uuid $id,
        public string $name,
    ) {
    }

    public static function fromResource(DomainResource $resource): self
    {
        return new self(
            $resource->getId(),
            $resource->getName(),
        );
    }
}
