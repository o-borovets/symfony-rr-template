<?php

declare(strict_types=1);

namespace App\ApiTools\Blueprints\Error;

readonly class ErrorListResponse
{
    /**
     * @param array<ErrorResponse> $errors
     */
    public function __construct(public array $errors)
    {
    }
}
