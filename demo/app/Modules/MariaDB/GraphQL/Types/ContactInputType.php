<?php

namespace App\Modules\MariaDB\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class ContactInputType extends GraphQLType {

    /**
     * @var bool Make this an input type definition
     */
    protected $inputObject = true;

    /**
     * @var array GraphQL Attributes
     */
    protected $attributes = [
        'name' => 'ContactInput',
        'description' => 'A contact information card.'
    ];

    /**
     * GraphQL type fields
     *
     * @return array
     */
    public function fields() : array {
        return [
            'primary_email' => [
                'name'  => 'primary_email',
                'type'  => Type::string(),
                'rules' => ['required', 'email']
            ],
            'secondary_email' => [
                'name'  => 'secondary_email',
                'type'  => Type::string(),
                'rules' => ['nullable', 'email']
            ],
            'primary_phone' => [
                'name'  => 'primary_phone',
                'type' => Type::string(),
                'rules' => ['required', 'string']
            ],
            'secondary_phone' => [
                'name' => 'secondary_phone',
                'type' => Type::string()
            ],
            'pager_number' => [
                'name' => 'pager_number',
                'type' => Type::string()
            ]
        ];
    }

}