<?php

declare(strict_types=1);

namespace Service\Words\Test\Entity\Word;

use DateTimeImmutable;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Service\Words\Entity\Word\Types\Description;
use Service\Words\Entity\Word\Types\Id;
use Service\Words\Entity\Word\Types\Name;
use Service\Words\Entity\Word\Word;
use Service\Words\Entity\Word\WordRepository;

/**
 * @internal
 */
final class CreateWordTest extends TestCase
{
    /**
     * @throws Exception
     */
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

        $repo = $this->createStub(WordRepository::class);
        $repo->method('add')->willReturn($id->getValue());

        self::assertEquals($id->getValue(), $repo->add($word));
    }
}
