<?php

namespace App\ApiTools\Blueprints\List;

readonly class OffsetPagination
{
    public function __construct(
        public int $total,
        public int $limit,
        public int $offset,
    )
    {
    }
}
