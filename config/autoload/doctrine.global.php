<?php
$cache = extension_loaded('apc') ? 'apc' : 'array';
return array(
    'doctrine' => array(
        'connection'    => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params'      => array(
                    'host'     => 'localhost',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => '',
                    'dbname'   => 'mydb',
                    'charset'  => 'utf8',
                )
            )
        ),
        'configuration' => array(
            'orm_default' => array(
                'metadata_cache' => $cache,
                'query_cache'    => $cache,
                'result_cache'   => $cache,
            )
        ),
        'driver'        => array(
            'application_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => $cache,
                'paths' => array(
                    __DIR__ . '/../../module/Application/src/Application/Entity',
                ),
            ),
            'orm_default'          => array(
                'drivers' => array(
                    'Application\Entity' => 'application_entities',
                )
            )
        )
    ),
);
