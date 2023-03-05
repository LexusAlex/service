<?php

declare(strict_types=1);

namespace Service\Configurations\Test;

use PHPUnit\Framework\TestCase;
use RuntimeException;

use function Service\Configurations\environment;

final class EnvironmentTest extends TestCase
{
    public function testUndefined(): void
    {
        $this->expectException(RuntimeException::class);
        environment('APPLICATION_ENVIRONMENT1');
    }

    public function testEnvironmentType(): void
    {
        self::assertSame(environment('APPLICATION_ENVIRONMENT'), getenv('APPLICATION_ENVIRONMENT'), 'ENVIRONMENT not equals');
    }

    public function testEnvironmentDefault(): void
    {
        self::assertSame('prod', environment('APPLICATION_ENVIRONMENT123', 'prod'));
    }
}
