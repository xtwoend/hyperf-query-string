<?php

namespace Xtwoend\QueryString;

use Xtwoend\QueryString\Request;
use Hyperf\HttpServer\Contract\RequestInterface;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                RequestInterface::class => Request::class
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for query string.',
                    'source' => __DIR__ . '/../publish/query-builder.php',
                    'destination' => BASE_PATH . '/config/query-builder.php',
                ],
            ],
        ];
    }
}
