<?php

declare(strict_types=1);

use Service\Http\Action\HomeAction;
use Service\Http\Action\Words\CreateWordAction;
use Slim\App;

return static function (App $application): void {
    $application->get('/', HomeAction::class);
    $application->post('/words/create-word', CreateWordAction::class);
};
