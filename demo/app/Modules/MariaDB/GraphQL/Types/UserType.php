<?php

namespace App\Modules\MariaDB\GraphQL\Types;

use App\Modules\MariaDB\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;


class UserType extends GraphQLType {

    /**
     * @var array Attributes
     */
    protected $attributes = [
        'model'       => User::class,
        'name'        => 'User',
        'description' => 'A system user account'
    ];

    /**
     * Get the graphql field schema
     *
     * @return array
     */
    public function fields() : array {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The ID of the user'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The user\'s email address'
            ],
            'data' => [
                'type' => GraphQL::type('data'),
                'description' => 'The user\'s data'
            ]
        ];
    }

}
