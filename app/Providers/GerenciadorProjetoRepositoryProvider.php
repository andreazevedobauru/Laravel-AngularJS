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

        $this->app->bind(\GerenciadorProjeto\Repositories\UserRepository::class, \GerenciadorProjeto\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\GerenciadorProjeto\Repositories\ClientRepository::class, \GerenciadorProjeto\Repositories\ClientRepositoryEloquent::class);
        $this->app->bind(\GerenciadorProjeto\Repositories\ProjectRepository::class, \GerenciadorProjeto\Repositories\ProjectRepositoryEloquent::class);
        $this->app->bind(\GerenciadorProjeto\Repositories\ProjectNoteRepository::class, \GerenciadorProjeto\Repositories\ProjectNoteRepositoryEloquent::class);
        $this->app->bind(\GerenciadorProjeto\Repositories\ProjectTaskRepository::class, \GerenciadorProjeto\Repositories\ProjectTaskRepositoryEloquent::class);
        $this->app->bind(\GerenciadorProjeto\Repositories\ProjectFileRepository::class, \GerenciadorProjeto\Repositories\ProjectFileRepositoryEloquent::class);
        $this->app->bind(\GerenciadorProjeto\Repositories\ProjectMemberRepository::class, \GerenciadorProjeto\Repositories\ProjectMemberRepositoryEloquent::class);
    }
}
