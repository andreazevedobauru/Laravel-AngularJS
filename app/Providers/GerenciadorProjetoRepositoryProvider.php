<?php

namespace GerenciadorProjeto\Providers;

use Illuminate\Support\ServiceProvider;

class GerenciadorProjetoRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(\GerenciadorProjeto\Repositories\ClientRepository::class, \GerenciadorProjeto\Repositories\ClientRepositoryEloquent::class);
    }
}
