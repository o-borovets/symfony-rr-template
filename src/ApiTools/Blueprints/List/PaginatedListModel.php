<?php

declare(strict_types=1);

namespace App\ApiTools\Blueprints\List;

/**
 * @template T
 */
abstract readonly class PaginatedListModel
{
    /** @param iterable<T> $data */
    public function __construct(
        public mixed $data,
        public CursorPagination|OffsetPagination|null $meta = null,
        public ?PaginatedListLinks $links = null,
    ) {
    }
}
