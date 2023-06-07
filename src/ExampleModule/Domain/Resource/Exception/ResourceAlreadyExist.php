<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Exception;

use Symfony\Component\Uid\Uuid;

class ResourceAlreadyExist extends \Exception
{
    public function __construct(Uuid $resourceId, ?\Throwable $previous = null)
    {
        parent::__construct(
            message: "Resource with {$resourceId} already exist",
            previous: $previous
        );
    }
}
