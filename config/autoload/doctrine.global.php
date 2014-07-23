<?php
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

if (IS_DEV) {
    $host            = 'host';
    $user            = 'user';
    $dbname          = 'dbname';
    $password        = 'password';
    $cache           = 'array';
    $generateProxies = true;
} elseif (IS_STG) {
    $host            = 'host';
    $user            = 'user';
    $dbname          = 'dbname';
    $password        = 'password';
    $cache           = 'array';
    $generateProxies = true;
} elseif (IS_PRD) {
    $host            = 'host';
    $user            = 'user';
    $dbname          = 'dbname';
    $password        = 'password';
    $cache           = extension_loaded('apc') ? 'apc' : 'array';
    $generateProxies = false;
}

return [
    'doctrine' => [
        'connection'    => [
            'orm_default' => [
                'driverClass' => Driver::class,
                'params'      => [
                    'host'             => $host,
                    'user'             => $user,
                    'password'         => $password,
                    'dbname'           => $dbname,
                    'charset'          => 'utf8',
                    'generate_proxies' => $generateProxies,
                ]
            ]
        ],
        'configuration' => [
            'orm_default' => [
                'metadata_cache' => $cache,
                'query_cache'    => $cache,
                'result_cache'   => $cache,
            ]
        ],
        'driver'        => [
            'application_entities' => [
                'class' => AnnotationDriver::class,
                'cache' => $cache,
                'paths' => [
                    __DIR__ . '/../../module/Application/src/Entity',
                ],
            ],
            'orm_default'          => [
                'drivers' => [
                    'Application\Entity' => 'application_entities',
                ]
            ]
        ]
    ],
];
