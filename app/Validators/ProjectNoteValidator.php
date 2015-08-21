<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 20/08/2015
 * Time: 08:30
 */

namespace GerenciadorProjeto\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{
    protected  $rules = [
        'project_id' => 'required|integer',
        'title' => 'required',
        'note' => 'required'
    ];


}