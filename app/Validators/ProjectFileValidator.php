<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 20/08/2015
 * Time: 08:30
 */

namespace GerenciadorProjeto\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class ProjectFileValidator extends LaravelValidator
{
    protected  $rules = [
        ValidatorInterface::RULE_CREATE => [
            'project_id' => 'required',
            'name' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png,gif,pdf,zip',
            'description' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'project_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]
    ];


}