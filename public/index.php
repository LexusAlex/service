<?php

declare(strict_types=1);

http_response_code(500);

require __DIR__ . '/../vendor/autoload.php';

$modules = ['Configurations', 'Db', 'Words'];

$dependencies = (require __DIR__ . '/../src/Configurations/dependencies.php')($modules);

$container = (require __DIR__ . '/../src/Configurations/container.php')($dependencies);

echo "<pre>";
print_r($container->set('test', []));

//Хорошо про phpunit https://www.youtube.com/watch?v=BGw-NVfZ1HI&t=401s