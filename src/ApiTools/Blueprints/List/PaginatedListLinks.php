<?php

declare(strict_types=1);

namespace App\ApiTools\Blueprints\List;

readonly class PaginatedListLinks
{
    public function __construct(
        public ?string $prev = null,
        public ?string $next = null,
        public ?string $self = null,
        public ?string $related = null,
    )
    {
    }
}
