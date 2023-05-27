<?php

declare(strict_types=1);

namespace Service\Words\Test\Entity\Word\Types;

use PHPUnit\Framework\TestCase;
use Service\Words\Entity\Word\Types\Description;

/**
 * @internal
 */
final class DescriptionTest extends TestCase
{
    public function testGetValue(): void
    {
        $name = new Description('Тестовая строка где много букв');
        self::assertEquals('Тестовая строка где много букв', $name->getValue());
    }
}
