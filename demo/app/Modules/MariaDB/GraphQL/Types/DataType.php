<?php

namespace App\Modules\MariaDB\GraphQL\Types;

use App\Modules\MariaDB\Models\User\Data;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;


class DataType extends GraphQLType {

    /**
     * @var array Attributes
     */
    protected $attributes = [
        'model'       => Data::class,
        'name'        => 'Data',
        'description' => 'A document representing a user\'s data'
    ];

    /**
     * Get the graphql field schema
     *
     * @return array
     */
    public function fields() {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The ID of the document'
            ],
            'user' => [
                'type' => GraphQL::type('user'),
                'description' => 'The user that the document belongs to',
            ],
            'data' => [
                'type' => new ObjectType([
                    'name' => 'data',
                    'description' => 'JSON data',
                    'fields' => [
                        'example_field' => ['type' => Type::string()]
                    ]
                ]),
                'description' => 'JSON data',
            ]
        ];
    }

}
