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
use GerenciadorProjeto\Entities\User;

class ProjectMemberTransformer extends TransformerAbstract
{
    public function transform(User $member){
        return [
            'member_id' => $member->id,
            'nome'      => $member->name
        ];
    }
}