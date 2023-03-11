<?php

declare(strict_types=1);

namespace Service\Words\Entity\Word;

use PDO;

final class WordRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function hasByName(string $name): bool
    {
        $statement = $this->pdo->prepare("SELECT `name` FROM `words_words` WHERE `name` = :name");
        $statement->execute(['name' => $name]);
        return boolval($statement->rowCount());
    }
    public function add(Word $word): string|false
    {
        $date = $word->getCreatedAt();

        $data = [
            'id' => $word->getId(),
            'name' => $word->getName(),
            'description' => $word->getDescription(),
            'created_at' => $date->format('Y-m-d H:i:s'),
        ];

        $sql = "INSERT INTO `words_words` (`id`,`name`,`description`,`created_at` ) VALUES (:id, :name, :description, :created_at)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);

        return $this->pdo->lastInsertId();
    }
}
