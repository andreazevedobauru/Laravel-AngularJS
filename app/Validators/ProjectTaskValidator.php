<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 20/08/2015
 * Time: 08:30
 */

namespace GerenciadorProjeto\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectTaskValidator extends LaravelValidator
{
    protected  $rules = [
        'name' => 'required|max:255',
        'project_id' => 'required|integer',
        'start_date' => 'required',
        'due_date' => 'required',
        'status' => 'required'
    ];


}