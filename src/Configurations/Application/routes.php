<?php

declare(strict_types=1);

use Service\Http\Action\HomeAction;
use Slim\App;

return static function (App $application): void {
    $application->get('/', HomeAction::class);
};
