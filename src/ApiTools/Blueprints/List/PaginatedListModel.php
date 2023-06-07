<?php

namespace App\ApiTools\Blueprints\List;

/**
 * @template T
 */
abstract readonly class PaginatedListModel
{
    /** @param list<T> $data */
    public function __construct(
        public mixed $data,
        public CursorPagination|OffsetPagination|null $meta,
        public ?PaginatedListLinks $links,
    )
    {
    }
}
