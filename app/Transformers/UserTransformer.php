<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 27/08/2015
 * Time: 17:08
 */

namespace GerenciadorProjeto\Transformers;

use GerenciadorProjeto\Entities\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    //protected $defaultIncludes = ['members'];

    public function transform(User $user){
        return [
            'id' => $user->id,
            'nome' => $user->name,
            'email' => $user->email,
        ];
    }
}