<?php

namespace App\ApiTools\Blueprints\Error;

readonly class ErrorResponse
{
    public function __construct(
        public string $status,
        public string $title,
        public string $detail,
        public array $parameters
    )
    {
    }
}
