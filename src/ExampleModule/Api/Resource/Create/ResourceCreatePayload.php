<?php

declare(strict_types=1);

namespace App\ExampleModule\Api\Resource\Create;

final readonly class ResourceCreatePayload
{
    public function __construct(
        public string $name,
        public string $value,
        public ?string $id = null,
    ) {
    }
}
