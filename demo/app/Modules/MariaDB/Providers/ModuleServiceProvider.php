<?php

namespace App\Modules\MariaDB\Providers;

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
        $this->loadTranslationsFrom(module_path('mariadb', 'Resources/Lang', 'app'), 'mariadb');
        $this->loadViewsFrom(module_path('mariadb', 'Resources/Views', 'app'), 'mariadb');
        $this->loadMigrationsFrom(module_path('mariadb', 'Database/Migrations', 'app'), 'mariadb');
        $this->loadConfigsFrom(module_path('mariadb', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('mariadb', 'Database/Factories', 'app'));
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
