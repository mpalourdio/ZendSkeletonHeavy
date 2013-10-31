<?php
$allEnvModules =  array(
    'Application',
    'DoctrineModule',
    'DoctrineORMModule',
    'MpaCustomDoctrineHydrator',
    'MpaFirephpWrapper',
);
$cacheconfig = true;
$cachemodule = true;

$isDev = getenv('APPLICATION_ENV') === 'development';
if($isDev) {
    $allEnvModules[] = 'ZendDeveloperTools';
    $cacheconfig = false;
    $cachemodule = false;
}

return array(
    'modules' => $allEnvModules,
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
        ),
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'config_cache_enabled' => $cacheconfig,
        'config_cache_key' => '645qsdf1654qetr21fg',
        'module_map_cache_enabled' => $cachemodule,
        'module_map_cache_key' => '321564sdf654ry32vrs',
        'cache_dir' => './data/cache',
        'check_dependencies' => true,
    ),
);
