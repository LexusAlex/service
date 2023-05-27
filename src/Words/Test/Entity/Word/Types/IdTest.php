<?php

declare(strict_types=1);

namespace Service\Words\Test\Entity\Word\Types;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Service\Words\Entity\Word\Types\Id;

/**
 * @internal
 */
final class IdTest extends TestCase
{
    public function testSuccess(): void
    {
        $id = new Id($value = Uuid::uuid7()->toString());
        self::assertEquals($value, $id->getValue());
    }

    public function testCase(): void
    {
        $value = Uuid::uuid7()->toString();

        $id = new Id(mb_strtoupper($value));

        self::assertEquals($value, $id->getValue());
    }

    public function testGenerate(): void
    {
        $id = Id::generate();

        self::assertNotEmpty($id->getValue());
    }

    public function testIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Id('12345');
    }

    public function testEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Id('');
    }
}
