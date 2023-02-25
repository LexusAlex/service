<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;

use function Service\Configurations\environment;

$configuration = [];

$configuration[] = new PhpFileProvider(__DIR__ . '/common/*.php');
$configuration[] = new PhpFileProvider(__DIR__ . '/' . environment('APPLICATION_ENVIRONMENT', 'production') . '/*.php');

$aggregator = new ConfigAggregator($configuration);

return $aggregator->getMergedConfig();
