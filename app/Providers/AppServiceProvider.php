<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Repositories\Contracts\productRepositoryInterface',
            'App\Repositories\Eloquent\productRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\userRepositoryInterface',
            'App\Repositories\Eloquent\userRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\financeiroRepositoryInterface',
            'App\Repositories\Eloquent\financeiroRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\cartRepositoryInterface',
            'App\Repositories\Eloquent\cartRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\savedCartsRepositoryInterface',
            'App\Repositories\Eloquent\savedCartsRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
