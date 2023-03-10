<?php

declare(strict_types=1);

http_response_code(500);

require __DIR__ . '/../vendor/autoload.php';

$modules = array_diff(scandir('../src'), ['..', '.']);

$dependencies = (require __DIR__ . '/../src/Configurations/dependencies.php')($modules);

$container = (require __DIR__ . '/../src/Configurations/container.php')($dependencies);

$application = (require __DIR__ . '/../src/Configurations/Application/application.php')($container);

$application->run();

//Хорошо про phpunit https://www.youtube.com/watch?v=BGw-NVfZ1HI&t=401s
//Пробуем для авторизации https://github.com/php-casbin/php-casbin
