<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource;

use Symfony\Component\Uid\Uuid;

class Resource
{
    private Uuid $id;

    private string $name;

    private string $value;

    public function __construct(Uuid $id, string $name, string $value)
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
    }

    public function getId(): Uuid
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
