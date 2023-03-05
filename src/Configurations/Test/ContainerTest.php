<?php

declare(strict_types=1);

namespace Service\Configurations\Test;

use PHPUnit\Framework\TestCase;

final class ContainerTest extends TestCase
{
    public function testSetValue()
    {
        $dependencies = (require __DIR__ . '/../dependencies.php')([]);
        $container = (require __DIR__ . '/../container.php')($dependencies);
        $container->set('test', ['test' => [1]]);

        self::assertTrue($container->has('test'));
        self::assertEquals(1, $container->get('test')['test'][0]);
    }
}
