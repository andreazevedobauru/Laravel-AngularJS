<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 27/08/2015
 * Time: 17:08
 */

namespace GerenciadorProjeto\Transformers;

use GerenciadorProjeto\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['members'];

    public function transform(Project $project){
        return [
            'id' => $project->id,
            'client' => $project->clients,
            'client_id' => $project->clients->id,
            'owner_id' => $project->owner_id,
            'members' => $project->members,
            'nome' => $project->nome,
            'description' => $project->description,
            'progress' => $project->progress,
            'status' => $project->status,
            'due_date' => $project->due_date,
            'is_member' => $project->owner_id =! \Authorizer::getResourceOwnerId()
        ];
    }

    public function includeMembers(Project $project){
        return $this->collection($project->members, new ProjectMemberTransformer());
    }

    public function includeClients(Project $project){
        return $this->collection($project->clients, new ClientTransformer());
    }

    public function includeTasks(Project $project){
        return $this->collection($project->tasks, new ProjectTaskTransformer());
    }

}