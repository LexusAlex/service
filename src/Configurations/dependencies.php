<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;

use function Service\Configurations\environment;

return static function (array $modules) {
    $configuration = [];
    /**
     * @var array{
     *     string
     * } $modules
     */
    foreach ($modules as $module) {
        $configuration[] = new PhpFileProvider(__DIR__ . "/../{$module}/Configuration/common/*.php");
        $configuration[] = new PhpFileProvider(__DIR__ . "/../{$module}/Configuration/" . environment('APPLICATION_ENVIRONMENT', 'production') . "/*.php");
    }

    $aggregator = new ConfigAggregator($configuration);

    return $aggregator->getMergedConfig();
};
