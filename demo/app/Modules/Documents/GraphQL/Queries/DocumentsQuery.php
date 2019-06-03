<?php

namespace App\Modules\Documents\GraphQL\Queries;

use App\Modules\Documents\Models\Document;
use GraphQL\Type\Definition\ListOfType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;


class DocumentsQuery extends Query {

    /**
     * @var array Attributes
     */
    protected $attributes = [
        'name' => 'Documents query'
    ];

    /**
     * Get the GraphQL type
     *
     * @return ListOfType|void
     */
    public function type() {
        return Type::listOf(GraphQL::type('document'));
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
     * @param $root
     * @param $args
     *
     * @return mixed
     */
    public function resolve($root, $args) {
        $query = Document::query();

        if (isset($args['id'])) {
            $query->where('_id' , $args['id'])->get();
        }
        if (isset($args['title'])) {
            $query->where('title', $args['title'])->get();
        }
        if (isset($args['version'])) {
            $query->where('title', $args['version'])->get();
        }
        return $query->get();
    }
}