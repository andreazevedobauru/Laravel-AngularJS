<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 27/08/2015
 * Time: 17:08
 */

namespace GerenciadorProjeto\Transformers;

use GerenciadorProjeto\Entities\ProjectFile;
use League\Fractal\TransformerAbstract;

class ProjectFileTransformer extends TransformerAbstract
{


    public function transform(ProjectFile $projectFile){
        return [
            'id' => $projectFile->id,
            'name' => $projectFile->name,
            'extension' => $projectFile->extension,
            'description' => $projectFile->description
        ];
    }
}