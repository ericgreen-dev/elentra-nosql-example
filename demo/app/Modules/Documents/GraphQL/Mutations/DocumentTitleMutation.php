<?php

namespace App\GraphQL\Mutations;

use App\Models\Document;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;


class DocumentTitleMutation extends Mutation {

    /**
     * @var array Attributes
     */
    protected $attributes = [
        'name' => 'UpdateDocumentTitle'
    ];

    /**
     * Get the GraphQL type
     *
     * @return mixed
     */
    public function type() {
        return GraphQL::type('document');
    }

    /**
     * Arguments
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
    public function rules(array $args = []) {
        return [
            'id' => [
                'required'
            ],
            'title' => [
                'required',
                'string'
            ]
        ];
    }

    /**
     * Resolve the GraphQL to Eloquent
     *
     * @param $root
     * @param $args
     *
     * @return Document
     */
    public function resolve($root, $args) {
        $document = Document::find($args['id']);

        if (!$document) {
            return null;
        }

        $document->title = $args['title'];
        $document->save();

        return $document;
    }

}
