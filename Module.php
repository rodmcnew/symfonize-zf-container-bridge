<?php

namespace Reliv\SymfonizeZFContainerBridge;

use Zend\Mvc\MvcEvent;

class Module
{
    public static $zendServiceManager;

    /**
     * Runs when ZF boots
     *
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        /**
         * Ensure the container bridge can get to the Zend Service Manager
         * in all cases.
         */
        self::$zendServiceManager = $e->getApplication()->getServiceManager();
    }

    /**
     * Returns the ZF config needed to make the container bridge work.
     *
     * @return array
     */
    public function getConfig()
    {
        return [
            'controllers' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ],
            ],
            'controller_plugins' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ],
            ],
            'filters' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ],
            ],
            'form_elements' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ],
            ],
            'hydrators' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ],
            ],
            'input_filters' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ],
            ],
            'route_manager' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ]
            ],
            'serializers' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ],
            ],
            'service_manager' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ]
            ],
            'validators' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ],
            ],
            'view_helpers' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ],
            ],
            'log_processors' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ],
            ],
            'log_writers' => [
                'abstract_factories' => [
                    'Reliv\SymfonizeZFContainerBridge\ContainerBridge'
                ],
            ]
        ];
    }
}
