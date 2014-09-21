ZendSkeletonHeavy
=================

Introduction
------------
This is a heavy assetic customized skeleton application.
Includes most common things that I use, for a quicker start.
It uses Bower to grab assets in public/vendor.

The assets installation is triggered for each composer install/update

Requirements
------------
PHP 5.5+ / Bower

Installation
------------
```php composer.phar create-project -sdev mpalourdio/mpa-zend-skeleton-heavy /path/to/project```

Features
--------
* Automatic APC caching in config files based on APC extension detection (doctrine, translators, config, modules map)
* Includes ZDT only if ```setEnv APPLICATION_ENV development``` is set in apache
* Boostrap 3.x
* JQuery  2.x / JQuery UI
* Select2 3.x
* Jquery UI boostrap https://github.com/addyosmani/jquery-ui-bootstrap
* Font-Awesome 4.x
* Animate.css
* Included and pre-configured modules (see autoload folder): 'DoctrineModule', 'DoctrineORMModule', 'MpaCustomDoctrineHydrator', 'MpaFirephpWrapper', 'ZendDeveloperTools', 'OcraCachedViewResolver'
* Cleaned layout.phtml and index.phtml
* Cleaned few code comments for more readability
* Dropped zf2 autoloader support in favor of composer only.

