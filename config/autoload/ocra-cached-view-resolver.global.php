<?php

use OcraCachedViewResolver\Module;

if (IS_DEV) {
    $adapterName = 'memory';
} elseif (IS_STG) {
    $adapterName = 'memory';
} elseif (IS_PRD) {
    $adapterName = extension_loaded('apc') ? 'apc' : 'memory';
}

return [
    Module::CONFIG => [
        'cache'                      => [
            'adapter' => [
                'name'    => $adapterName,
                'options' => [
                    'ttl'       => 84600,
                    'namespace' => 'app_view_resolver_' . sha1(realpath(__FILE__)),
                ],
            ],
        ],
        Module::CONFIG_CACHE_KEY     => 'cached_template_map',
        Module::CONFIG_CACHE_SERVICE => 'OcraCachedViewResolver\\Cache\\ResolverCache',
    ],
];
