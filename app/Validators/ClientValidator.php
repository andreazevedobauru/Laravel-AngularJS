<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 20/08/2015
 * Time: 08:30
 */

namespace GerenciadorProjeto\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected  $rules = [
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'telefone' => 'required',
        'address' => 'required'
    ];


}