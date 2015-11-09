<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 27/08/2015
 * Time: 17:08
 */

namespace GerenciadorProjeto\Transformers;

use GerenciadorProjeto\Entities\ProjectMember;
use League\Fractal\TransformerAbstract;
use GerenciadorProjeto\Entities\User;

class ProjectMemberTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'user'
    ];

    public function transform(ProjectMember $member){
        return [
            'project_id' => $member->project_id
        ];
    }

    public function includeUser(ProjectMember $member){
        return $this->item($member->member, new ProjectMemberTransformer());
    }
}