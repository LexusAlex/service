<?php

declare(strict_types=1);

namespace Service\Words\Test\Entity\Word\Types;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Service\Words\Entity\Word\Types\Name;

/**
 * @covers \Service\Words\Entity\Word\Types\Name;
 *
 * @internal
 */
final class NameTest extends TestCase
{
    public function testGetValue(): void
    {
        $name = new Name('testWord');
        self::assertEquals('testWord', $name->getValue());
    }
    public function testEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Name('');
    }
}
