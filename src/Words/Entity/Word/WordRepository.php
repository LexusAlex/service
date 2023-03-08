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

    public function add(Word $word): void
    {
        $data = [
            'id' => $word->getId(),
            'name' => $word->getName(),
            'description' => $word->getDescription(),
            'created_at' => $word->getCreatedAt(),
        ];

        $sql = "INSERT INTO words_words (id,name,description,created_at ) VALUES (:id, :name, :description, :created_at)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }
}
