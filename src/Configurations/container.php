<?php

declare(strict_types=1);

use DI\ContainerBuilder;

return static function ($dependencies) {
    $builder = new ContainerBuilder();
    $builder->addDefinitions($dependencies);
    return $builder->build();
};