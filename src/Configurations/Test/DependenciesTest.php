<?php

declare(strict_types=1);

namespace Service\Configurations\Test;

use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class DependenciesTest extends TestCase
{
    public function testEmpty(): void
    {
        $dependencies = (require __DIR__ . '/../dependencies.php')([]);
        self::assertCount(0, $dependencies);
    }
}
