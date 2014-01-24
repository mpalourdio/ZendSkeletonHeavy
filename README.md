ZendSkeletonHeavy
=================

Introduction
------------
This is a heavy assetic customized skeleton application.
Includes most common things that I use, for a quicker start...

Requirements
------------
PHP 5.4+

Installation
------------
```php composer.phar create-project -sdev mpalourdio/mpa-zend-skeleton-heavy /path/to/project```

Features
--------
* Automatic APC caching in config files based on APC extension detection (doctrine, translators, config, modules map)
* Includes ZDT only if ```setEnv APPLICATION_ENV development``` is set in apache
* Boostrap 3.0.3 (minified)
* JQuery  2.0.3 / JQuery UI 1.10.3 + I18n translations (minified)
* Select2 3.4.4
* Jquery UI boostrap https://github.com/addyosmani/jquery-ui-bootstrap
* Font-Awesome 4
* Animation.css
* Included and pre-configured modules (see autoload folder): 'DoctrineModule', 'DoctrineORMModule', 'MpaCustomDoctrineHydrator', 'MpaFirephpWrapper', 'ZendDeveloperTools'
* cleaned layout.phtml and index.phtml
* cleaned few code comments for more readability

