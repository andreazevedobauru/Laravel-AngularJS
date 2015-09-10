<?php

namespace GerenciadorProjeto\Http\Controllers;

use GerenciadorProjeto\Entities\Client;
use GerenciadorProjeto\Repositories\ClientRepository;
use GerenciadorProjeto\Services\ClientService;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    /**
     * @var ClientService
     */

    private $service;
    /**
     * @var ClientRepository
     */
    private $repository;

    public function __construct(ClientRepository $repository, ClientService $service){
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ClientRepository $repository)
    {
        
        return $this->repository->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->repository->create($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if($this->checkExist($id)){
            return $this->repository->find($id);
        }else{
            return ['error'=>'Cliente nao encontrado!'];
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if($this->checkExist($id) == false){
            return ['error'=>'Cliente nao encontrado!'];
        }
        return $this->service->update($request->all(), $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->checkExist($id)){
            return $this->repository->delete($id);
        }else{
            return ['error'=>'Cliente nao encontrado!'];
        }
    }


    /**
     * Testando se existe o dado com o ID informado
     *
     * @param int $id
     * return boolean
     */
    private function checkExist($id){
        if(Client::find($id)){
            return true;
        }else{
            return false;
        }
    }
}
