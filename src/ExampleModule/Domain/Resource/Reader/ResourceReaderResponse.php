<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Reader;

use App\ApiTools\Blueprints\List\PaginatedListModel;
use App\ExampleModule\Domain\Resource\Resource as DomainResource;

/**
 * @template-extends PaginatedListModel<ResourceReaderResponseItem>
 */
readonly class ResourceReaderResponse extends PaginatedListModel
{
    /**
     * @param iterable<DomainResource> $resources
     */
    public static function createFromIterable(iterable $resources): self
    {
        $data = [];

        foreach ($resources as $resource) {
            $data[] = ResourceReaderResponseItem::fromResource($resource);
        }

        return new self($data);
    }
}
