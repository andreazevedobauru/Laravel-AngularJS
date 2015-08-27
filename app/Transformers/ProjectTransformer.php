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
    public function transform(Project $project){
        return [
            'project_id' => $project->id,
            'project' => $project->name,
            'description' => $project->description,
            'progress' => $project->progress,
            'status' => $project->status,
            'due_date' => $project->duo_date,
        ];
    }
}