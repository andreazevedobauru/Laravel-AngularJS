<?php

namespace GerenciadorProjeto\Http\Controllers;


use GerenciadorProjeto\Entities\Project;
use GerenciadorProjeto\Repositories\ProjectRepository;
use GerenciadorProjeto\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @var ProjectService
     */

    private $service;
    /**
     * @var ProjectRepository
     */
    private $repository;

    public function __construct(ProjectRepository $repository, ProjectService $service){
        $this->repository = $repository;
        $this->service = $service;
        $this->middleware('check.project.owner', ['except'=>['store', 'show']]);
        $this->middleware('check.project.permission', ['except'=>['store', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        
        return $this->repository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return $this->repository->create($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     *
     */
    public function store(Request $request)
    {

        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     */
    public function show($id)
    {
        if($this->service->checks($id) == false){
            return ['error'=>'Access Forbidden or Project Not Found'];
        }
        return $this->repository->find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     *
     */
    public function update(Request $request, $id)
    {
        if($this->service->checks($id) == false){
            return ['error'=>'Access Forbidden or Project Not Found'];
        }
        return $this->service->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy($id)
    {
        if($this->service->checks($id) == false){
            return ['error'=>'Access Forbidden or Project Not Found'];
        }

        /*
         * Comentado na aula: Consideracoes finais de refatoracao na api - 23/10/2015
         * */
        $this->repository->delete($id);
        /*if($this->repository->delete($id)){
            return ['success' => true];
        }else{
            return ['error' => 'Try again.'];
        }*/
    }

}
