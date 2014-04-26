<?php
return [
    'zenddevelopertools' => [
        'profiler' => [
            'enabled'     => true,
            'strict'      => false,
            'flush_early' => false,
            'cache_dir'   => 'data/cache',
            'matcher'     => [],
            'collectors'  => ['db' => null, 'config' => null],
        ],
        'toolbar'  => [
            'enabled'       => true,
            'auto_hide'     => false,
            'position'      => 'bottom',
            'version_check' => true,
            'entries'       => [],
        ],
        'events'   => [
            'enabled'     => true,
            'collectors'  => [],
            'identifiers' => []
        ],
    ],
];
