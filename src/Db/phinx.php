<?php

declare(strict_types=1);

use function Service\Configurations\environment;

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_environment' => 'development',
        'development' => [
            'adapter' => 'mysql',
            'host' => environment('MYSQL_HOST'),
            'name' => environment('MYSQL_DATABASE'),
            'user' => environment('MYSQL_USER'),
            'pass' => environment('MYSQL_PASSWORD'),
            'port' => environment('MYSQL_PORT'),
            'charset' => environment('MYSQL_CHARSET'),
        ],
    ],
    'version_order' => 'creation'
];
