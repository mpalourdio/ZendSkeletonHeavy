<?php
$allEnvModules = [
    'Application',
    'DoctrineModule',
    'DoctrineORMModule',
    'MpaCustomDoctrineHydrator',
    'OcraCachedViewResolver',
    'ZfTwitterWidget',
    'ZfMaintenanceMode',
];
$cacheconfig   = true;
$cachemodule   = true;

if (IS_DEV) {
    $allEnvModules[] = 'ZendDeveloperTools';
    $allEnvModules[] = 'MpaFirephpWrapper';
    $allEnvModules[] = 'OcraServiceManager';
    $cacheconfig = false;
    $cachemodule = false;
}

return [
    'modules'                 => $allEnvModules,
    'module_listener_options' => [
        'module_paths'             => [
            './module',
            './vendor',
        ],
        'config_glob_paths'        => [
            'config/autoload/{,*.}{global,local}.php',
        ],
        'config_cache_enabled'     => $cacheconfig,
        'config_cache_key'         => '645qsdf1654qetr21fg',
        'module_map_cache_enabled' => $cachemodule,
        'module_map_cache_key'     => '321564sdf654ry32vrs',
        'cache_dir'                => './data/cache',
        'check_dependencies'       => true,
    ],
];
