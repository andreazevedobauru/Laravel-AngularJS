<?php

namespace GerenciadorProjeto\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use GerenciadorProjeto\Entities\Project;
use GerenciadorProjeto\Presenters\ProjectPresenter;


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
        if(count($this->skipPresenter()->findWhere(['id'=>$projectId, 'owner_id'=>$userId])) > 0){
            return true;
        }

        return false;
    }

    public function hasMember( $projectId, $memberId ){

        $project = $this->skipPresenter()->find($projectId);

        foreach($project->members as $member){
            if($member->id == $memberId){
                return true;
            }
        }

        return false;
    }

    public function findWithOwnerAndMember($userId){
        return $this->scopeQuery(function($query) use($userId){
            return $query->select('projects.*')
                            ->leftJoin('project_members', 'project_members.project_id', '=', 'projects.id')
                            ->where('project_members.member_id', '=', $userId)
                            ->union($this->model->query()->getQuery()->where('owner_id', '=', $userId));
        })->all();
    }

    public function presenter(){
        return ProjectPresenter::class;
    }
}