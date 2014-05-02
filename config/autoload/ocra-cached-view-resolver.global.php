<?php
if (IS_DEV) {
    $adapterName = 'memory';
} elseif (IS_STG) {
    $adapterName = 'memory';
} elseif (IS_PRD) {
    $adapterName = extension_loaded('apc') ? 'apc' : 'memory';
}

return [
    'ocra_cached_view_resolver' => [
        // configuration to be passed to `Zend\Cache\StorageFactory#factory()`
        'cache'                   => [
            'adapter' => [
                'name'    => $adapterName,
                'options' => [
                    'ttl'       => 84600,
                    'namespace' => 'app_view_resolver_' . sha1(realpath(__FILE__)),
                ],
            ],
        ],

        // following is the key used to store the template map in the cache adapter
        'cached_template_map_key' => 'cached_template_map',
    ],
];
