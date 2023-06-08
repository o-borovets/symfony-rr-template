<?php

declare(strict_types=1);

namespace App\ApiTools\Blueprints\Error;

readonly class ErrorResponse
{
    /**
     * @param array<string, string> $parameters
     */
    public function __construct(
        public string $status,
        public string $title,
        public string $detail,
        public array $parameters
    )
    {
    }
}
