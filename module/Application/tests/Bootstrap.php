<?php
use ApplicationTest\Util\ServiceManagerFactory;

ini_set('error_reporting', E_ALL);

if (!defined('IS_DEV')) {
    define('IS_DEV', true);
}
if (!defined('IS_PRD')) {
    define('IS_PRD', false);
}
if (!defined('IS_STG')) {
    define('IS_STG', false);
}

$files = [__DIR__ . '/../../../vendor/autoload.php'];

foreach ($files as $file) {
    if (file_exists($file)) {
        $loader = require $file;

        break;
    }
}

if (!isset($loader)) {
    throw new RuntimeException('vendor/autoload.php could not be found. Did you install via composer?');
}

$loader->add('ApplicationTest\\', __DIR__);

$configFiles = [__DIR__ . '/TestConfiguration.php', __DIR__ . '/TestConfiguration.php.dist'];

foreach ($configFiles as $configFile) {
    if (file_exists($configFile)) {
        $config = require $configFile;

        break;
    }
}

ServiceManagerFactory::setApplicationConfig($config);
unset($files, $file, $loader, $configFiles, $configFile, $config);
