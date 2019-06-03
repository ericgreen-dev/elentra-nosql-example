<?php

namespace App\Modules\Documents\Providers;

use App\Modules\Documents\GraphQL\Mutations\DocumentTitleMutation;
use App\Modules\Documents\GraphQL\Queries\DocumentsQuery;
use App\Modules\Documents\GraphQL\Types\DocumentType;
use Illuminate\Support\ServiceProvider;
use Rebing\GraphQL\Support\Facades\GraphQL;


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
//        GraphQL::addType(DocumentType::class, 'document');
//        GraphQL::addType(DocumentType::class, 'document');
    }

    /**
     * Register the GraphQL schema
     *
     * @return void
     */
    protected function registerSchema() {
//        GraphQL::mergeSchemas('default', [
//            'query' => [
//                'documents' => DocumentsQuery::class
//            ],
//            'mutation' => [
////                'updateDocumentTitle' => DocumentTitleMutation::class
//            ]
//        ]);
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
