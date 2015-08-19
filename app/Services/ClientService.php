<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 19/08/2015
 * Time: 16:41
 */

namespace GerenciadorProjeto\Services;


use GerenciadorProjeto\Repositories\ClientRepository;

class ClientService
{
    protected $repository;

    public function __construct(ClientRepository $repository){
        $this->repository = $repository;
    }

    public function create(array $data)){
        return $this->repository->create($data);
    }

    public function update(array $data, $id){
        return $this->repository->update($data, $id);
    }
}