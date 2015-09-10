<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 27/08/2015
 * Time: 17:08
 */

namespace GerenciadorProjeto\Transformers;

use GerenciadorProjeto\Entities\Client;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['members'];

    public function transform(Client $client){
        return [
            'id' => $client->id,
            'nome' => $client->nome,
            'responsible' => $client->responsible,
            'email' => $client->email,
            'telefone' => $client->telefone,
            'address' => $client->address,
            'obs' => $client->obs,
        ];
    }
}