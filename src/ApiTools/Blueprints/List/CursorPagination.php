<?php

declare(strict_types=1);

namespace App\ApiTools\Blueprints\List;

readonly class CursorPagination
{
    public function __construct(
        public int $total,
        public int $current,
        public string $next,
    )
    {
    }
}
