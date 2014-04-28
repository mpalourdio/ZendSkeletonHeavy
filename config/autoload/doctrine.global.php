<?php
if (IS_DEV) {
    $host     = 'host';
    $user     = 'user';
    $dbname   = 'dbname';
    $password = 'password';
    $cache    = 'array';
} elseif (IS_STG) {
    $host     = 'host';
    $user     = 'user';
    $dbname   = 'dbname';
    $password = 'password';
    $cache    = 'array';
} elseif (IS_PRD) {
    $host     = 'host';
    $user     = 'user';
    $dbname   = 'dbname';
    $password = 'password';
    $cache    = extension_loaded('apc') ? 'apc' : 'array';
}

return [
    'doctrine' => [
        'connection'    => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params'      => [
                    'host'     => $host,
                    'user'     => $user,
                    'password' => $password,
                    'dbname'   => $dbname,
                    'charset'  => 'utf8',
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
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => $cache,
                'paths' => [
                    __DIR__ . '/../../module/Application/src/Application/Entity',
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
