<?php

namespace App\Modules\MariaDB\GraphQL\Types;

use App\Modules\MariaDB\Models\Data;
use GraphQL\Type\Definition\ObjectType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;


class DataType extends GraphQLType {

    /**
     * @var array Attributes
     */
    protected $attributes = [
        'model'       => Data::class,
        'name'        => 'Data',
        'description' => 'A System user\'s data'
    ];

    /**
     * Get the graphql field schema
     *
     * @return array
     */
    public function fields() : array {
        return [
            'user' => [
                'type' => GraphQL::type('user'),
                'description' => 'The user that the data belongs to',
            ],
            'data' => [
                'description' => 'A series of fields representing a user\'s personal data',
                'is_relation' => false,
                'type' => new ObjectType([
                    'name' => 'attributes',
                    'fields' => [
                        'primary_contact' => [
                            'type' => GraphQL::type('contact'),
                            'description' => 'The user\'s primary contact information'
                        ],
                        'emergency_contact' => [
                            'type' => GraphQL::type('contact'),
                            'description' => 'The user\'s emergency contact information'
                        ],
                        'primary_address' => [
                            'type' => GraphQL::type('address'),
                            'description' => 'The user\'s primary address information'
                        ],
                    ]
                ])
            ]
        ];
    }

}
