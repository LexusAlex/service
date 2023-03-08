<?php

declare(strict_types=1);

namespace Service\Words\Command\Word\CreateWord;

use DateTimeImmutable;
use Service\Words\Entity\Word\Types\Description;
use Service\Words\Entity\Word\Types\Id;
use Service\Words\Entity\Word\Types\Name;
use Service\Words\Entity\Word\Word;
use Service\Words\Entity\Word\WordRepository;

final class Handler
{
    public function __construct(
        private readonly WordRepository $words
    ) {
    }

    public function handle(Command $command): void
    {
        $word = Word::createWord(
            Id::generate(),
            new DateTimeImmutable(),
            new Name($command->name),
            new Description($command->description)
        );

        $this->words->add($word);
    }
}
