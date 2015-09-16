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
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        return $this->repository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
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
        if($this->checks($id) == false){
            return ['error'=>'Access Forbidden or Project Not Found'];
        }
        return $this->repository->find($id);

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
        if($this->checks($id) == false){
            return ['error'=>'Access Forbidden or Project Not Found'];
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
        if($this->checks($id) == false){
            return ['error'=>'Access Forbidden or Project Not Found'];
        }
        return $this->repository->delete($id);
    }

    private function checkProjectOwner($projectId){
        $userId     = \Authorizer::getResourceOwnerId();

        return $this->repository->isOwner($projectId, $userId);
    }

    private function checkProjectMember($projectId){
        $userId     = \Authorizer::getResourceOwnerId();

        return $this->repository->hasMember($projectId, $userId);
    }

    private function checkProjectPermissions($projectId){

        if($this->checkProjectOwner($projectId) || $this->checkProjectMember($projectId)){
            return true;
        }

        return false;
    }

    private function checkExist($id){
        if($this->repository->find($id)){
            return true;
        }else{
            return false;
        }
    }

    private function checks($id){
        if($this->checkProjectPermissions($id) == false || $this->checkExist($id) == false){
            return false;
        }

        return true;
    }
}
