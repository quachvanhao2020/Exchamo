<?php
use Exchamo\Api\Rest\Expense as ApiExpense;
use Exchamo\Api\Rest\Income as ApiIncome;

return [
    'doctrine' => [
        'driver' => [
            Exchamo::class => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__."/../src/Api/Rest",
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    Exchamo::class => Exchamo::class,
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            ApiExpense\Controller::class => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/expenses[/:expenses_id]',
                    'defaults' => [
                        'controller' => ApiExpense\Controller::class,
                    ],
                ],
            ],
            ApiIncome\Controller::class => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/incomes[/:incomes_id]',
                    'defaults' => [
                        'controller' => ApiIncome\Controller::class,
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            ApiExpense\Controller::class,
            ApiIncome\Controller::class,
        ],
    ],
    'api-tools-rest' => [
        ApiExpense\Controller::class => [
            'listener' => \Laminas\ApiTools\Admin\Model\DoctrineAdapterResource::class,
            'route_name' => ApiExpense\Controller::class,
            'route_identifier_name' => 'expense_id',
            'collection_name' => 'expense',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => '50',
            'entity_class' => ApiExpense\Entity::class,
            'collection_class' => ApiExpense\Collection::class,
            'service_name' => 'expense',
        ],
        ApiIncome\Controller::class => [
            'listener' => \Laminas\ApiTools\Admin\Model\DoctrineAdapterResource::class,
            'route_name' => ApiIncome\Controller::class,
            'route_identifier_name' => 'income_id',
            'collection_name' => 'income',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => '50',
            'entity_class' => ApiIncome\Entity::class,
            'collection_class' => ApiIncome\Collection::class,
            'service_name' => 'income',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            ApiExpense\Controller::class => 'HalJson',
            ApiIncome\Controller::class => 'HalJson',
        ],
        'accept_whitelist' => [
            ApiExpense\Controller::class => [
                0 => 'application/vnd.user.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            ApiIncome\Controller::class => [
                0 => 'application/vnd.user.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            ApiExpense\Controller::class => [
                0 => 'application/vnd.user.v1+json',
                1 => 'application/json',
            ],
            ApiIncome\Controller::class => [
                0 => 'application/vnd.user.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-content-validation' => [
        ApiIncome\Controller::class => [
            'input_filter' => ApiIncome\Validator::class,
        ],
    ],
    'input_filter_specs' => [
        ApiIncome\Validator::class => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'message',
            ],
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            ApiIncome\Controller::class => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
    'api-tools' => [
        'db-connected' => [
            ApiIncome\Resource::class => [
                'adapter_name' => 'sqlite',
                'table_name' => 'incomes',
                'hydrator_name' => \Doctrine\Laminas\Hydrator\DoctrineObject::class,
                'controller_service_name' => ApiIncome\Controller::class,
                'entity_identifier_name' => 'id',
                'table_service' => ApiIncome\Resource::class,
            ],
            ApiExpense\Resource::class => [
                'adapter_name' => 'sqlite',
                'table_name' => 'expense',
                'hydrator_name' => \Doctrine\Laminas\Hydrator\DoctrineObject::class,
                'controller_service_name' => ApiExpense\Controller::class,
                'entity_identifier_name' => 'id',
                'table_service' => ApiExpense\Resource::class,
            ],
        ],
    ],
];