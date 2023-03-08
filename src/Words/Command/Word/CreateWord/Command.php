<?php

declare(strict_types=1);

namespace Service\Words\Command\Word\CreateWord;

final class Command
{
    public function __construct(
        public string $name = '',
        public string $description = ''
    ) {
    }
}
