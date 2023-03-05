<?php

declare(strict_types=1);

return
    (new PhpCsFixer\Config())
        ->setCacheFile(__DIR__ . '/var/cache/.php_cs')
        ->setFinder(
            PhpCsFixer\Finder::create()
                ->in([
                    __DIR__ . '/public',
                    __DIR__ . '/src',
                ])
                ->append([
                    __FILE__,
                ])
        )
        ->setRules([
            '@PER' => true,
        ]);
