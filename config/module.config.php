<?php
use Exchamo\Api\V1\Rest\Expense as ApiExpense;
use Exchamo\Api\V1\Rest\Income as ApiIncome;

return [
    'doctrine' => [
        'driver' => [
            Exchamo::class => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__."/../src/Api/V1/Rest",
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
    'api-tools-hal' => [
        'metadata_map' => [
            ApiExpense\Entity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => ApiExpense\Controller::class,
                'route_identifier_name' => 'expenses_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            ApiExpense\Collection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => ApiExpense\Controller::class,
                'route_identifier_name' => 'expenses_id',
                'is_collection' => true,
            ],
            ApiIncome\Entity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => ApiIncome\Controller::class,
                'route_identifier_name' => 'incomes_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            ApiIncome\Collection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => ApiIncome\Controller::class,
                'route_identifier_name' => 'incomes_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools-rest' => [
        ApiExpense\Controller::class => [
            'listener' => ApiExpense\Resource::class,
            'route_name' => ApiExpense\Controller::class,
            'route_identifier_name' => 'expenses_id',
            'collection_name' => 'expenses',
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
            'service_name' => 'expenses',
        ],
        ApiIncome\Controller::class => [
            'listener' => ApiIncome\Resource::class,
            'route_name' => ApiIncome\Controller::class,
            'route_identifier_name' => 'incomes_id',
            'collection_name' => 'incomes',
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
            'service_name' => 'incomes',
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
        ApiExpense\Controller::class => [
            'input_filter' => ApiExpense\Validator::class,
        ],
    ],
    'input_filter_specs' => [
        ApiIncome\Validator::class => [
            0 => [
                'name' => 'id',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            1 => [
                'name' => 'name',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'note',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'status',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'name' => 'dateCreated',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            5 => [
                'name' => 'ref',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            6 => [
                'name' => 'class',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            7 => [
                'name' => 'money_price',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            8 => [
                'name' => 'money_currency',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            9 => [
                'name' => 'owned_id',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            10 => [
                'name' => 'owned_class',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            11 => [
                'name' => 'target_id',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            12 => [
                'name' => 'target_class',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
        ApiExpense\Validator::class => [
            0 => [
                'name' => 'id',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            1 => [
                'name' => 'name',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'note',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'status',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'name' => 'dateCreated',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            5 => [
                'name' => 'ref',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            6 => [
                'name' => 'class',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            7 => [
                'name' => 'money_price',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            8 => [
                'name' => 'money_currency',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            9 => [
                'name' => 'owned_id',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            10 => [
                'name' => 'owned_class',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            11 => [
                'name' => 'target_id',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            12 => [
                'name' => 'target_class',
                'required' => false,
                'filters' => [],
                'validators' => [],
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
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => ApiIncome\Controller::class,
                'entity_identifier_name' => 'id',
                'table_service' => ApiIncome\Resource::class."\\Table",
            ],
            ApiExpense\Resource::class => [
                'adapter_name' => 'sqlite',
                'table_name' => 'expenses',
                'hydrator_name' => \Doctrine\Laminas\Hydrator\DoctrineObject::class,
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => ApiExpense\Controller::class,
                'entity_identifier_name' => 'id',
                'table_service' => ApiExpense\Resource::class."\\Table",
            ],
        ],
    ],
];