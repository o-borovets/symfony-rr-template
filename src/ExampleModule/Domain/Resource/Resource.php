<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource;

class Resource
{
    private readonly string $id;

    private string $name;

    private string $value;


    public function __construct(string $name, string $value, string $id = null)
    {
        $this->id = $id ?? bin2hex(random_bytes(24));
        $this->name = $name;
        $this->value = $value;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
