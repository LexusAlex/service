<?php

declare(strict_types=1);

namespace Service\Words\Entity\Word\Types;

final class Description
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
