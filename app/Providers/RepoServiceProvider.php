<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'App\Http\Interfaces\AuthRepositoryInterface',
            'App\Http\Eloquent\AuthRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\UserRepositoryInterface',
            'App\Http\Eloquent\UserRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\SettingsRepositoryInterface',
            'App\Http\Eloquent\SettingsRepository'
        );
    }
}