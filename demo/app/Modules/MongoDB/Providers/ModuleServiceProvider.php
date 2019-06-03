<?php

namespace App\Modules\MongoDB\Providers;

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
        $this->loadTranslationsFrom(module_path('mongodb', 'Resources/Lang', 'app'), 'mongodb');
        $this->loadViewsFrom(module_path('mongodb', 'Resources/Views', 'app'), 'mongodb');
        $this->loadMigrationsFrom(module_path('mongodb', 'Database/Migrations', 'app'), 'mongodb');
        $this->loadConfigsFrom(module_path('mongodb', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('mongodb', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
