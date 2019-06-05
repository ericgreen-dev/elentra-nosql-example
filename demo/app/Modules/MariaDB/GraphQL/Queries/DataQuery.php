<?php

namespace App\Modules\MariaDB\GraphQL\Queries;

use App\Modules\MariaDB\Models\Data;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;


class DataQuery extends Query {

    /**
     * @var array Attributes
     */
    protected $attributes = [
        'name' => 'User data query'
    ];

    /**
     * Get the GraphQL type
     *
     * @return Type
     */
    public function type() {
        return GraphQL::type('data');
    }

    /**
     * Query args
     *
     * @return array
     */
    public function args() {
        return [
            'user' => [
                'name' => 'user',
                'type' => Type::int(),
                'rules' => ['required', 'exists:users,id']
            ]
        ];
    }

    /**
     * Resolve GraphQL query to Eloquent
     *
     * @param array        $root
     * @param array        $args
     * @param SelectFields $fields
     *
     * @return mixed
     */
    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info) {  //dd($info);
        return Data::query()
            ->where('user_id', $args['user'])
            ->select($fields->getSelect())
            ->with($fields->getRelations())
            ->first();
    }

}
