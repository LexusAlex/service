<?php

declare(strict_types=1);

namespace Service\Words\Entity;

use DateTimeImmutable;

final class Word
{
    private string $id;
    private DateTimeImmutable $created_at;
    private string $name;
    private string $description;

    private function __construct(string $id, DateTimeImmutable $created_at, string $name, string $description)
    {
        $this->id = $id;
        $this->created_at = $created_at;
        $this->name = $name;
        $this->description = $description;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->created_at;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
