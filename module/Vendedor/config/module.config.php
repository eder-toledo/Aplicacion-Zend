<?php

namespace Vendedor;

return array(
    //agregamos doctrine
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Application/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'application_entities'
                )
            )
        )
    ),
    'router' => array(
        'routes' => array(
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'vendedor' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/modulo3',
                    'constraints' => array(
                    ),
                    'defaults' => array(
                        'controller' => 'Vendedor\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'ventas'=>array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/modulo3/ventas[/][:action][/][:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Vendedor\Controller\Ventas',
                        'action' => 'index',
                    ),
                ),
            ),
            'cortes'=>array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/modulo3/cortes[/][:action][/][:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Vendedor\Controller\Cortes',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Vendedor\Controller\Index' => Controller\IndexController::class,
            'Vendedor\Controller\Cortes' => Controller\CortesController::class,
            'Vendedor\Controller\Ventas' => Controller\VentasController::class
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'vendedor/index/index' => __DIR__ . '/../view/vendedor/index/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
