<?php

declare(strict_types=1);

namespace Service\Configurations\Test;

use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class ContainerTest extends TestCase
{
    public function testSetValue(): void
    {
        $dependencies = (require __DIR__ . '/../dependencies.php')([]);

        $container = (require __DIR__ . '/../container.php')($dependencies);
        $container->set('test', ['test' => [1]]);

        self::assertTrue($container->has('test'));
        /**
         * @psalm-suppress MixedArrayAccess
         */
        self::assertEquals(1, $container->get('test')['test'][0]);
    }
}
