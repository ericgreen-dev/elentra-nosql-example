<?php

namespace App\Modules\MariaDB\Providers;

use App\Modules\MariaDB\GraphQL\Queries\DataQuery;
use App\Modules\MariaDB\GraphQL\Types\AddressType;
use App\Modules\MariaDB\GraphQL\Types\ContactType;
use App\Modules\MariaDB\GraphQL\Types\DataType;
use App\Modules\MariaDB\GraphQL\Types\UserType;
use Caffeinated\Modules\Support\ServiceProvider;
use Rebing\GraphQL\Support\Facades\GraphQL;


class GraphQLServiceProvider extends ServiceProvider {

    /** 
     * Register any application services.
     *
     * @return void
     */
    public function boot() : void {
        $this->bootTypes();
        $this->bootSchemas();
    }

    /**
     * Register GraphQL types
     *
     * @return void
     */
    protected function bootTypes() : void {
        GraphQL::addType(UserType::class, 'user');
        GraphQL::addType(DataType::class, 'data');
        GraphQL::addType(ContactType::class, 'contact');
        GraphQL::addType(AddressType::class, 'address');
    }

    /**
     * Register the GraphQL schema
     *
     * @return void
     */
    protected function bootSchemas() : void {
        GraphQL::addSchema('maria', [
            'query' => [
                'data' => DataQuery::class
            ],
            'mutation' => [
            ],
            'middleware' => [
                'auth.basic'
            ],
            'method' => [
                'get',
                'post'
            ],
        ]);
    }

}
