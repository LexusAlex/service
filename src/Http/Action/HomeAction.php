<?php

declare(strict_types=1);

namespace Service\Http\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Service\Slim\Response\HtmlResponse;

final class HomeAction implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new HtmlResponse(file_get_contents(__DIR__ . '/../../../public/build/index.html'));
    }
}
