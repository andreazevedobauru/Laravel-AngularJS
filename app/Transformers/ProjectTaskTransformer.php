<?php

namespace GerenciadorProjeto\Transformers;

use League\Fractal\TransformerAbstract;
use GerenciadorProjeto\Entities\ProjectTask;

/**
 * Class ProjectTaskTransformer
 * @package namespace GerenciadorProjeto\Transformers;
 */
class ProjectTaskTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProjectTask entity
     * @param \ProjectTask $model
     *
     * @return array
     */
    public function transform(ProjectTask $model) {
        return [
            'id'         => (int)$model->id,
            'name' => $model->name,
            'project_id' => $model->project_id,
            'start_date' => $model->start_date,
            'due_date' => $model->due_date,
            'status' => $model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}