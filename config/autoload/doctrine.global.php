<?php
$cache = extension_loaded('apc') ? 'apc' : 'array';
return [
    'doctrine' => [
        'connection'    => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params'      => [
                    'host'     => 'localhost',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => '',
                    'dbname'   => 'mydb',
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
