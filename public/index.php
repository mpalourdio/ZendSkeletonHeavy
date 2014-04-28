<?php
define('IS_PRD', getenv('APPLICATION_ENV') == 'production');
define('IS_STG', getenv('APPLICATION_ENV') == 'staging');
define('IS_DEV', !(IS_STG || IS_PRD));
/**
 * Fallback to dev if non prd and non tst. Useful for unit tests
 * and if SetEnv is not (correctly) set on localhost apache.
 *
 * /!\ Those constants are only meant to be used in config files.
 */
if (IS_DEV) {
    $_SERVER['APPLICATION_ENV'] = 'development';
} else {
    $_SERVER['APPLICATION_ENV'] = getenv('APPLICATION_ENV');
}

define('REQUEST_MICROTIME', microtime(true));
chdir(dirname(__DIR__));

if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

if (file_exists('vendor/autoload.php')) {
    $loader = include 'vendor/autoload.php';
}

Zend\Mvc\Application::init(require 'config/application.config.php')->run();
