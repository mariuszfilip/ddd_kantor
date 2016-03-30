<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories'=> array(
            'Application\Controller\Index' => 'Application\Controller\Service\IndexControllerFactory'
        )
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
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
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
    /*
* You can use the full set of configuration options provided by malocher/cqrs-esb
* {@see https://github.com/malocher/cqrs-esb/tree/master/iterations/Iteration}
*
* Put everything under the key cqrs.
* The malocher/zf2-cqrs-module pass the configuration to Malocher\Cqrs\Configuration\Setup,
* first time you request the malocher.cqrs.gate from the service manager.
*/
    'cqrs' => array(
        /*
         * We use only one bus in this example and set it as default, so we can
         * call $malocherCqrsGate->getBus() without the need to tell the gate wich bus we want to get.
         *
         * You could also have multiple buses, f.e. an extra error bus, a frontend bus,
         * or a bus for each domain (if you have more than one)
         */
        'default_bus' => 'domain-bus',
        'adapters' => array(
            /**
             * CQRS Adapters help you to setup your system.
             * We use the ArrayMapAdapter here. It is a very simple Adapter.
             * We have to map comands, queries and events to handlers and listeners
             * by hand.
             *
             * There are other adapters available, f.e. an AnnotationAdapter or an Adapter
             * that works with coneventions to do the mapping.
             */
            'Malocher\Cqrs\Adapter\ArrayMapAdapter' => array(
                'buses' => array(
                    /*
                     * Register all commands, queries and events on the DomainBus
                     */
                    'Cantor\Application\Cqrs\Bus\DomainBus' => array(
                        /*
                         * Each Adapter has it's own configuration structure.
                         * The ArrayMapAdapter needs complete mapping information
                         * for each cqrs message (command, query, event)
                         */
                        'Cantor\Application\Cqrs\Command\SignUpCommand' => array(
                            /*
                             * The alias of a handler or listener should match to
                             * an alias used within the service manager.
                             */
                            'alias' => 'signup_command_handler',
                            'method' => 'execute'
                        ),
                    )
                )
            )
        )
    ),
);
