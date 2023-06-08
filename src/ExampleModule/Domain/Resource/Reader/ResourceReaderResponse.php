<?php

namespace App\ExampleModule\Domain\Resource\Reader;

use App\ApiTools\Blueprints\List\PaginatedListModel;
use App\ExampleModule\Domain\Resource\Resource;

/**
 * @template-implements PaginatedListModel<ResourceReaderResponseItem>
 */
readonly class ResourceReaderResponse extends PaginatedListModel
{
    /**
     * @param iterable<Resource> $resources
     */
    public static function createFromIterable(iterable $resources): self
    {
        return new self(
            array_map(
                static fn(Resource $item) => ResourceReaderResponseItem::fromResource($item),
                iterator_to_array($resources),
            ),
        );
    }
}
