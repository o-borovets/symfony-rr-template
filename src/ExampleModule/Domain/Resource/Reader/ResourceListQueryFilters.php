<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Reader;

final readonly class ResourceListQueryFilters
{
    public function __construct(
        public ?string $name,
        public ?\DateTimeImmutable $createdFrom,
    ) {
    }
}
