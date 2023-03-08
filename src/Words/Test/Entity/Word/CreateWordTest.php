<?php

declare(strict_types=1);

namespace Service\Words\Test\Entity\Word;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Service\Words\Entity\Word\Types\Description;
use Service\Words\Entity\Word\Types\Id;
use Service\Words\Entity\Word\Types\Name;
use Service\Words\Entity\Word\Word;

/**
 * @internal
 */
final class CreateWordTest extends TestCase
{
    public function testSuccess(): void
    {
        $word = Word::createWord(
            $id = Id::generate(),
            $date = new DateTimeImmutable(),
            $name = new Name('test'),
            $description = new Description('Длинная строка')
        );

        self::assertEquals($id, $word->getId());
        self::assertEquals($date, $word->getCreatedAt());
        self::assertEquals($name, $word->getName());
        self::assertEquals($description, $word->getDescription());
    }
}
