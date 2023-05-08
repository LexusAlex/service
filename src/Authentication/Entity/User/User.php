<?php

declare(strict_types=1);

namespace Service\Authentication\Entity\User;

use DateTimeImmutable;
use Service\Authentication\Entity\User\Types\Email;
use Service\Authentication\Entity\User\Types\Id;

final class User
{
    private Id $id;
    private DateTimeImmutable $created_at;
    private Email $email;
    private ?string $passwordHash = null;

    private function __construct(Id $id, DateTimeImmutable $created_at, Email $email)
    {
        $this->id = $id;
        $this->created_at = $created_at;
        $this->email = $email;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->created_at;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }
    public function getPasswordHash(): ?string
    {
        return $this->passwordHash;
    }

    public static function requestJoinByEmail(
        Id $id,
        DateTimeImmutable $created_at,
        Email $email,
        string $passwordHash,
    ): self {
        $user = new self($id, $created_at, $email);
        $user->passwordHash = $passwordHash;
        return $user;
    }
}
