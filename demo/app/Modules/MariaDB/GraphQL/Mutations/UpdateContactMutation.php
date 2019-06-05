<?php

namespace App\Modules\MariaDB\GraphQL\Mutations;

use App\Modules\MariaDB\Models\Data;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;


class UpdateContactMutation extends Mutation {

    /**
     * @var array Mutation attributes
     */
    protected $attributes = [
        'name' => 'UpdateUserContact'
    ];

    /**
     * The GraphQL type for the query
     *
     * @return Type
     */
    public function type() : Type {
        return GraphQL::type('data');
    }

    /**
     * Args for the GraphQL query
     *
     * @return array
     */
    public function args() : array {
        return [
            'user_id' => [
              'name' => 'user_id',
              'type' => Type::int()
            ],
            'data' => [
                'name' => 'data',
                'type' => GraphQL::type('contact_input')
            ]
        ];
    }

    /**
     * Validation rules
     *
     * @param array $args
     *
     * @return array
     */
    public function rules(array $args = []) : array {
        return [
            'user_id' => ['required', 'exists:users,id']
        ];
    }

    /**
     * Resolve the GraphQL query to Eloquent
     *
     * @param array $root
     * @param array $args
     *
     * @return mixed
     */
    public function resolve($root, $args) {
        $data = Data::firstOrCreate([
            'user_id' => $args['user_id']
        ], ['data' => []]);

        $data->forceFill([Data::path('primary_contact') => $args['data']]);
        $data->save();

        return $data;
    }

}
