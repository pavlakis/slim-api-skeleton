<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Monolog settings
        'logger' => [
            'name' => 'slim-api-app',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],

    'doctrine' => [
        'meta' => [
            'entity_path' => [
                'app/src/Entity'
            ],
            'auto_generate_proxies' => true,
            'proxy_dir' =>  realpath(dirname(__DIR__) . '/cache/proxies'),
            'cache' => null,
        ],
        'connection' => [
            'driver'   => 'pdo_mysql',
            'host'     => '127.0.0.1',
            'dbname'   => 'slim-api',
            'user'     => 'root',
            'password' => 'Admin123',
        ]
    ],
];
