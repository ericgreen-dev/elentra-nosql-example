<?php

namespace App\Modules\MariaDB\Providers;

use App\Modules\MariaDB\Models\User;
use Caffeinated\Modules\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;


class FacadeServiceProvider extends ServiceProvider {

    /**
     * @var bool Defer registration of service provider until needed
     */
    protected $defer = true;

    /**
     * Get the services provided by this provider
     *
     * @return array
     */
    public function provides() : array {
        return [User::class];
    }

    /**
     * Register service bindings with the container
     *
     * @return void
     */
    public function register() : void {

        /**
         *
         * Provide the current user
         */
        $this->app->bind(User::class, static function () {
            return User::find(Auth::user()->id);
        });
    }

}