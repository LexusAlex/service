<?php

declare(strict_types=1);

namespace Service\Authentication\Entity\User\Types;

use Webmozart\Assert\Assert;

final class Email
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::email($value);
        $this->value = strtolower($value);
    }

    public function isEqualTo(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
