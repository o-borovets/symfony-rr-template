<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Reader;

use Symfony\Component\Validator\Constraints as Assert;

final readonly class ResourceReaderQuery
{
    public function __construct(

        // TODO use nested aboject vs put filter directly to query object
        #[Assert\Valid]
        public ?ResourceListQueryFilters $filters,
        #[Assert\LessThanOrEqual(50)]
        public int $limit,
        #[Assert\GreaterThanOrEqual(0)]
        public int $offset,
    ) {
    }
}
