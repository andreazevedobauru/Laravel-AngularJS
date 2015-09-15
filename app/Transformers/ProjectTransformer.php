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
            'project_id' => $project->id,
            'client' => $project->clients,
            'owner_id' => $project->owner_id,
            'members' => $project->members,
            'project' => $project->nome,
            'description' => $project->description,
            'progress' => $project->progress,
            'status' => $project->status,
            'due_date' => $project->due_date,
        ];
    }

    public function includeMembers(Project $project){
        return $this->collection($project->members, new ProjectMemberTransformer());
    }

    public function includeClients(Project $project){
        return $this->collection($project->clients, new ClientTransformer());
    }
}