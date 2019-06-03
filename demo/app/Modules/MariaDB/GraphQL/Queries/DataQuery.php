<?php


namespace App\Modules\MariaDB\GraphQL\Queries;

use App\Modules\MariaDB\Models\User\Data;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Illuminate\Http\Request;


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
    public function resolve($root, $args) {
        return Data::user($args['id'])->get();
    }

}
