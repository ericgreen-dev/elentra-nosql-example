<?php

namespace App\Modules\MongoDB\GraphQL\Queries;

use App\Modules\MongoDB\Models\Document;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;


class DocumentQuery extends Query {

    /**
     * @var array Attributes
     */
    protected $attributes = [
        'name' => 'Documents query'
    ];

    /**
     * Get the GraphQL type
     *
     * @return Type
     */
    public function type() : Type {
        return GraphQL::type('document');
    }

    /**
     * Query args
     *
     * @return array
     */
    public function args() : array {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::string()
            ],
            'title' => [
                'name' => 'title',
                'type' => Type::string()
            ],
            'version' => [
                'name' => 'version',
                'type' => Type::string()
            ],
        ];
    }

    /**
     * Resolve GraphQL query to Eloquent
     *
     * @param array $root
     * @param array $args
     *
     * @return mixed
     */
    public function resolve($root, $args) {
        $query = Document::query();

        if (isset($args['id'])) {
            $query->where('_id' , $args['id']);
        }
        if (isset($args['title'])) {
            $query->where('title', $args['title']);
        }
        if (isset($args['version'])) {
            $query->where('title', $args['version']);
        }
        return $query->first();
    }
}