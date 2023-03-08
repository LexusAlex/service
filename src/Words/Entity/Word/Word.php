<?php

declare(strict_types=1);

namespace Service\Words\Entity\Word;

use DateTimeImmutable;
use Service\Words\Entity\Word\Types\Description;
use Service\Words\Entity\Word\Types\Id;
use Service\Words\Entity\Word\Types\Name;

final class Word
{
    private Id $id;
    private DateTimeImmutable $created_at;
    private Name $name;
    private Description $description;

    private function __construct(Id $id, DateTimeImmutable $created_at, Name $name, Description $description)
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

    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getDescription(): Description
    {
        return $this->description;
    }
}
