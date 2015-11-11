<?php

namespace GerenciadorProjeto\Repositories;

use GerenciadorProjeto\Presenters\ProjectMemberPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GerenciadorProjeto\Entities\ProjectMember;

/**
 * Class ProjectMemberRepositoryRepositoryEloquent
 * @package namespace GerenciadorProjeto\Repositories;
 */
class ProjectMemberRepositoryEloquent extends BaseRepository implements ProjectMemberRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectMember::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    public function presenter(){
        return ProjectMemberPresenter::class;
    }
}