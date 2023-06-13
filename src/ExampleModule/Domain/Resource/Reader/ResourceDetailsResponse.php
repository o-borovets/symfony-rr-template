<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Reader;

use Symfony\Component\Uid\Uuid;

class ResourceDetailsResponse
{
    public function __construct(
        public Uuid $id,
        public string $name,
        public string $value,
    ) {
    }
}
