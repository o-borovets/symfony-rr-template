<?php

namespace App\ExampleModule\Domain\Creator;

final readonly class ResourceCreateCommand
{
    public function __construct(
        public string $name,
        public string $value,
        public ?string $id = null,
    )
    {
    }
}
