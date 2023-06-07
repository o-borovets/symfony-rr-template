<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Exception;

use Psr\Log\LogLevel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\WithHttpStatus;
use Symfony\Component\HttpKernel\Attribute\WithLogLevel;

#[WithHttpStatus(Response::HTTP_NOT_FOUND)]
#[WithLogLevel(LogLevel::DEBUG)]
class ResourceNotFound extends \Exception
{
    public function __construct(string $resourceId, ?\Throwable $previous = null)
    {
        parent::__construct(
            message: "Resource '{$resourceId}' not found",
            previous: $previous,
        );
    }
}
