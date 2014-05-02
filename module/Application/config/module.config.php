<?php
use Application\Controller\IndexController;
use Application\Controller\IndexControllerFactory;
use Zend\Cache\Service\StorageCacheAbstractServiceFactory;
use Zend\Log\LoggerAbstractServiceFactory;
use Zend\Mvc\Router\Http\Literal;

$translatorCache = extension_loaded('apc') ? ['adapter' => 'apc'] : null;

return [
    'router'          => [
        'routes' => [
            'home'        => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'          => 'Literal',
                'options'       => [
                    'route'    => '/application',
                    'defaults' => [
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'IndexController',
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'default' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'       => '/[:controller[/:action]]',
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults'    => [],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'abstract_factories' => [
            StorageCacheAbstractServiceFactory::class,
            LoggerAbstractServiceFactory::class,
        ],
        'aliases'            => [
            'translator' => 'MvcTranslator',
        ],
    ],
    'translator'      => [
        'locale'                    => 'en_US',
        'translation_file_patterns' => [
            [
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ],
        ],
        'cache'                     => $translatorCache,
    ],
    'controllers'     => [
        'factories' => [
            IndexController::class => IndexControllerFactory::class
        ],
    ],
    'view_manager'    => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map'             => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack'      => [
            __DIR__ . '/../view',
        ],
        'strategies'               => [
            'ViewJsonStrategy',
        ],
    ],
    // Placeholder for console routes
    'console'         => [
        'router' => [
            'routes' => [],
        ],
    ],
];
