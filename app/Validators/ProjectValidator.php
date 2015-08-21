<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 20/08/2015
 * Time: 08:30
 */

namespace GerenciadorProjeto\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected  $rules = [
        'owner_id' => 'required|integer',
        'client_id' => 'required|integer',
        'nome' => 'required|max:255',
        'description' => 'required',
        'status' => 'required',
        'progress' => 'required',
        'due_date' => 'required'
    ];


}