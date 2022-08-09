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
        $this->app->bind(\App\Services\PokemonService\PokemonServiceInterface::class, \App\Services\PokemonService\PokemonService::class);
        $this->app->bind(\App\Services\TeamService\TeamServiceInterface::class, \App\Services\TeamService\TeamService::class);

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
