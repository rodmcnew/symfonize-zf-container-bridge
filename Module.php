<?php

namespace Reliv\SymfonizeZFContainerBridge;

class Module
{
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
                ],
                'invokables' => [
                    'symfonize_zf.route_bridge' =>
                        'Reliv\SymfonizeZF\RouteBridge\RouteBridge'
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
