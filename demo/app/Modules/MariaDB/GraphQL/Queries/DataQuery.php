<?php


namespace App\Modules\MariaDB\GraphQL\Queries;

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
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ]
        ];
    }

    /**
     * Resolve GraphQL query to Eloquent
     *
     * @param $root
     * @param $args
     *
     * @return mixed
     */
    public function resolve($root, $args, SelectFields $fields) {
    dd($fields->getSelect(), $fields->getRelations());
//        return Data::user($args['id'])->get();


//        $select = $fields->getSelect();
//        $with = $fields->getRelations();
//
//        $users = User::select($select)->with($with);
//
//        return $users->get();
    }

}
