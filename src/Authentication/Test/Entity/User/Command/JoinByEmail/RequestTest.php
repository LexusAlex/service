<?php

declare(strict_types=1);

namespace Service\Authentication\Test\Entity\User\Command\JoinByEmail;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Service\Authentication\Entity\User\Types\Email;
use Service\Authentication\Entity\User\Types\Id;
use Service\Authentication\Entity\User\User;

/**
 * @internal
 */
final class RequestTest extends TestCase
{
    public function testSuccess(): void
    {
        $user = User::requestJoinByEmail(
            $id = Id::generate(),
            $date = new DateTimeImmutable(),
            $email = new Email('mail@example.com'),
            $hash = 'hash',
        );

        self::assertEquals($id, $user->getId());
        self::assertEquals($date, $user->getCreatedAt());
        self::assertEquals($email, $user->getEmail());
        self::assertEquals($hash, $user->getPasswordHash());
    }
}
