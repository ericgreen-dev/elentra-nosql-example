<?php

namespace App\Modules\MongoDB\GraphQL\Mutations;

use App\Modules\MongoDB\Models\Document;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;


class UpdateDocumentMutation extends Mutation {

    /**
     * @var array Attributes
     */
    protected $attributes = [
        'name' => 'UpdateDocumentTitle'
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
     * Arguments
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
            'content' => [
                'name' => 'content',
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
    public function rules(array $args = []) : array {
        return [
            'id'      => ['required'],
            'title'   => ['string', 'max:50'],
            'content' => ['string', 'max:500']
        ];
    }

    /**
     * Resolve the GraphQL to Eloquent
     *
     * @param $root
     * @param $args
     *
     * @return mixed
     */
    public function resolve($root, $args) {
        $document = Document::find($args['id']);

        if (!$document) {
            return null;
        }

        $document->fill($args);
        $document->version = ($document->version ?? 0) + 1;
        $document->save();

        return $document;
    }

}
