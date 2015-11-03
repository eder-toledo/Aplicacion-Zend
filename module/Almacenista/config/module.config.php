<?php
namespace Almacenista;

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
            
            'almacenista' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/modulo2',
                    'constraints' => array(
                    ),
                    'defaults' => array(
                        'controller' => 'Almacenista\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'surtimiento'=>array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/modulo2/surtimiento[/][:action][/][:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Almacenista\Controller\Surtimiento',
                        'action' => 'index',
                    ),
                ),
            ),
            'compra'=>array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/modulo2/compra[/][:action][/][:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Almacenista\Controller\Compras',
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
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Almacenista\Controller\Index' => Controller\IndexController::class,
            'Almacenista\Controller\Compras' => Controller\ComprasController::class,
            'Almacenista\Controller\Surtimiento' => Controller\SurtimientoController::class
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'almacenista/index/index' => __DIR__ . '/../view/almacenista/index/index.phtml',
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
