<?php

namespace App\Providers;

use App\GraphQL\Mutations\DocumentTitleMutation;
use App\GraphQL\Queries\DocumentsQuery;
use Illuminate\Support\ServiceProvider;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\GraphQL\Types\DocumentType;


class GraphQLServiceProvider extends ServiceProvider {

    /** 
     * Register any application services.
     *
     * @return void
     */
    public function register()  {
        $this->registerTypes();
        $this->registerSchema();
    }

    /**
     * Register GraphQL types
     *
     * @return void
     */
    protected function registerTypes() {
        GraphQL::addType(DocumentType::class, 'document');
        GraphQL::addType(DocumentType::class, 'document');
    }

    /**
     * Register the GraphQL schema
     *
     * @return void
     */
    protected function registerSchema() {
        GraphQL::mergeSchemas('default', [
            'query' => [
                'documents' => DocumentsQuery::class
            ],
            'mutation' => [
                'updateDocumentTitle' => DocumentTitleMutation::class
            ]
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

}
