<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableWords extends AbstractMigration
{
    public function up(): void
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `words_words` (
          `id` CHAR(36) NOT NULL,
          `name` VARCHAR(255) NOT NULL,
          `description` VARCHAR(255),
          `created_at` DATETIME NOT NULL,
          PRIMARY KEY (`id`),
          UNIQUE KEY (`name`)
        ) CHARACTER SET utf8 COLLATE utf8_general_ci");
    }

    public function down(): void
    {
        $this->execute("DROP TABLE `words_words`");
    }
}
