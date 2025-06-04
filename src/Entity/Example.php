<?php

declare(strict_types=1);

namespace App\Entity;

class Example
{
    private ?string $name;

    private bool $status = false;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): string
    {
        $this->name = $name;
    }
}