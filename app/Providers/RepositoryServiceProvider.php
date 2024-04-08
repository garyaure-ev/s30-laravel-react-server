<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Interfaces\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );
        $this->app->bind(
            'App\Interfaces\RoleRepositoryInterface',
            'App\Repositories\RoleRepository'
        );
        $this->app->bind(
            'App\Interfaces\ResponseRepositoryInterface',
            'App\Repositories\ResponseRepository'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
