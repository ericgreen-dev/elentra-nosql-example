<?php

namespace App\Modules\MongoDB\Providers;

use App\Modules\MongoDB\GraphQL\Mutations\DocumentTitleMutation;
use App\Modules\MongoDB\GraphQL\Queries\DocumentsQuery;
use App\Modules\MongoDB\GraphQL\Types\DocumentType;
use Illuminate\Support\ServiceProvider;
use Rebing\GraphQL\Support\Facades\GraphQL;


class GraphQLServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() : void {
        $this->bootTypes();
        $this->bootSchemas();
    }

    /**
     * Boot GraphQL types
     *
     * @return void
     */
    protected function bootTypes() : void {
        GraphQL::addType(DocumentType::class, 'document');
    }

    /**
     * Boot the GraphQL schema
     *
     * @return void
     */
    protected function bootSchemas() : void {
        GraphQL::addSchema('mongo', [
            'query' => [
                'documents' => DocumentsQuery::class
            ],
            'mutation' => [
                'updateDocumentTitle' => DocumentTitleMutation::class
            ]
        ]);
    }

}
