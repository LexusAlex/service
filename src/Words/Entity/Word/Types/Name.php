<?php

declare(strict_types=1);

namespace Service\Words\Entity\Word\Types;

use Webmozart\Assert\Assert;

final class Name
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::stringNotEmpty($value);
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
