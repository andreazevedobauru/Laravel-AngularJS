<?php

namespace GerenciadorProjeto\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GerenciadorProjeto\Entities\ProjectNote;
use GerenciadorProjeto\Presenters\ProjectNotePresenter;

/**
 * Class ProjectNoteRepositoryEloquent
 * @package namespace GerenciadorProjeto\Repositories;
 */
class ProjectNoteRepositoryEloquent extends BaseRepository implements ProjectNoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectNote::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    public function presenter(){
        return ProjectNotePresenter::class;
    }
}