<?php

namespace App\Modules\Documents\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('documents', 'Resources/Lang', 'app'), 'documents');
        $this->loadViewsFrom(module_path('documents', 'Resources/Views', 'app'), 'documents');
        $this->loadMigrationsFrom(module_path('documents', 'Database/Migrations', 'app'), 'documents');
        $this->loadConfigsFrom(module_path('documents', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('documents', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(GraphQLServiceProvider::class);
    }
}
