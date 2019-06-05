<?php

namespace App\Modules\MariaDB\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class ContactType extends GraphQLType {

    /**
     * @var array Attributes
     */
    protected $attributes = [
        'name'        => 'Contact',
        'description' => 'Attributes that comprise a persons contact information'
    ];

    /**
     * Get the graphql field schema
     *
     * @return array
     */
    public function fields() : array {
        return [
            'primary_email' => [
                'type' => Type::string()
            ],
            'secondary_email' => [
                'type' => Type::string()
            ],
            'primary_phone' => [
                'type' => Type::string()
            ],
            'secondary_phone' => [
                'type' => Type::string()
            ],
            'pager_number' => [
                'type' => Type::string()
            ]
        ];
    }

}
