<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Create;

use Symfony\Component\Uid\Uuid;

final readonly class ResourceCreateCommand
{
    public function __construct(
        public string $name,
        public string $value,
        public ?Uuid $id = null,
    ) {
    }
}
