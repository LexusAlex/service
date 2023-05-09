<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableUsers extends AbstractMigration
{
    public function up(): void
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `authentication_users` (
          `id` CHAR(36) NOT NULL,
          `email` VARCHAR(255) NOT NULL,
          `password_hash` VARCHAR(255) DEFAULT NULL,
          `created_at` DATETIME NOT NULL,
          PRIMARY KEY (`id`),
          UNIQUE KEY (`email`)
        ) CHARACTER SET utf8 COLLATE utf8_general_ci");
    }

    public function down(): void
    {
        $this->execute("DROP TABLE `authentication_users`");
    }
}
