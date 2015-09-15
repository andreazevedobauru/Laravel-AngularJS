<?php

namespace GerenciadorProjeto\Repositories;

use GerenciadorProjeto\Presenters\UserPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GerenciadorProjeto\Entities\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace GerenciadorProjeto\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    public function presenter(){
        return UserPresenter::class;
    }
}