<?php

declare(strict_types=1);

namespace Service\Slim\Test\Response;

use JsonException;
use PHPUnit\Framework\TestCase;
use Service\Slim\Response\JsonResponse;
use stdClass;

/**
 * @internal
 */
final class JsonResponseTest extends TestCase
{
    /**
     * @throws JsonException
     */
    public function testWithCode(): void
    {
        $response = new JsonResponse(0, 201);

        self::assertEquals('application/json', $response->getHeaderLine('Content-Type'));
        self::assertEquals('0', $response->getBody()->getContents());
        self::assertEquals(201, $response->getStatusCode());
    }

    /**
     * @dataProvider getCases
     * @throws JsonException
     */
    public function testResponse(mixed $source, mixed $expect): void
    {
        $response = new JsonResponse($source);

        self::assertEquals('application/json', $response->getHeaderLine('Content-Type'));
        self::assertEquals($expect, $response->getBody()->getContents());
        self::assertEquals(200, $response->getStatusCode());
    }

    /**
     * @return iterable<array-key, array<array-key, mixed>>
     */
    public static function getCases(): iterable
    {
        $object = new stdClass();
        $object->str = 'value';
        $object->int = 1;
        $object->none = null;

        $array = [
            'str' => 'value',
            'int' => 1,
            'none' => null,
        ];

        return [
            'null' => [null, 'null'],
            'empty' => ['', '""'],
            'number' => [12, '12'],
            'string' => ['12', '"12"'],
            'object' => [$object, '{"str":"value","int":1,"none":null}'],
            'array' => [$array, '{"str":"value","int":1,"none":null}'],
        ];
    }
}
