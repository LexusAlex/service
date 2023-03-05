<?php

declare(strict_types=1);

use function Service\Configurations\environment;

return [
    PDO::class => static function () {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Режим обработки ошибок
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Режим получения данных
            PDO::ATTR_STRINGIFY_FETCHES => false, // Преобразовывать числовые значения в строки во время выборки
            PDO::ATTR_EMULATE_PREPARES => false, // Режим эмуляции запросов
        ];

        $host = environment('MYSQL_HOST');
        $dbname = environment('MYSQL_DATABASE');
        $charset = environment('MYSQL_CHARSET');
        $username = environment('MYSQL_USER');
        $password = environment('MYSQL_PASSWORD');

        return (new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password, $options));
    },
];
