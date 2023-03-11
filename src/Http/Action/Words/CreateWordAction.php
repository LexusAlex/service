<?php

declare(strict_types=1);

namespace Service\Http\Action\Words;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Service\Words\Command\Word\CreateWord\Command;
use Service\Words\Command\Word\CreateWord\Handler;
use Slim\Psr7\Response;

final class CreateWordAction implements RequestHandlerInterface
{
    public function __construct(
        private readonly Handler $handler
    ) {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /**
         * @var array{name:?string, description:?string} $data
         */
        $data = $request->getParsedBody();

        $command = new Command();
        $command->name = $data['name'] ?? '';
        $command->description = $data['description'] ?? '';

        $this->handler->handle($command);

        return new Response();
    }
}
