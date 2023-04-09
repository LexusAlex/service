<?php

declare(strict_types=1);

namespace Service\Authentication\Command\JoinByEmail\Request;

final readonly class Command
{
    public function __construct(
        public string $email = '',
        public string $password = ''
    ) {
    }
}
