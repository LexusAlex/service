<?php

declare(strict_types=1);

namespace Service\Configurations\Test;

use PHPUnit\Framework\TestCase;


final class DependenciesTest extends TestCase
{
    public function testEmpty(){
        $dependencies = (require __DIR__ . '/../dependencies.php')([]);
        self::assertCount(0, $dependencies);
    }
}
