<?php

namespace App\Modules\MariaDB\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class AddressType extends GraphQLType {

    /**
     * @var array Attributes
     */
    protected $attributes = [
        'name'        => 'Address',
        'description' => 'Attributes that comprise an address'
    ];

    /**
     * Get the graphql field schema
     *
     * @return array
     */
    public function fields() : array {
        return [
            'street_number' => [
                'type' => Type::string()
            ],
            'street_name' => [
                'type' => Type::string()
            ],
            'unit_type' => [
                'type' => Type::string()
            ],
            'postal_code' => [
                'type' => Type::string()
            ],
        ];
    }

}
