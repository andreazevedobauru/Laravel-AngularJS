<?php

namespace GerenciadorProjeto\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GerenciadorProjeto\Entities\Project;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace GerenciadorProjeto\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(){
        return Project::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot(){
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    public function isOwner( $projectId, $userId ){
        if(count($this->findWhere(['id'=>$projectId, 'owner_id'=>$userId])) > 0){
            return true;
        }

        return false;
    }
}