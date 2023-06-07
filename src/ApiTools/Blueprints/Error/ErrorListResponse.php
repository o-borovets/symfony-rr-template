<?php

namespace App\ApiTools\Blueprints\Error;

readonly class ErrorListResponse
{
    /**
     * @var list<ErrorResponse> $errors
     */
    public function __construct(array $errors)
    {
    }
}
