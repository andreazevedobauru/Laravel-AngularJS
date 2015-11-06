<?php

namespace GerenciadorProjeto\Http\Controllers;

use GerenciadorProjeto\Repositories\ProjectTaskRepository;
use GerenciadorProjeto\Services\ProjectTaskService;
use Illuminate\Http\Request;


class ProjectTaskController extends Controller
{
    /**
     * @var ProjectTaskService
     */
    private $service;
    /**
     * @var ProjectTaskRepository
     */
    private $repository;

    public function __construct(ProjectTaskRepository $repository, ProjectTaskService $service){
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        return $this->repository->skipPresenter()->with(['project'])->findWhere(['project_id'=>$id]);
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
    public function store(Request $request, $id)
    {
        $data = $request->all();
        $data['project_id'] = $id;
        return $this->service->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, $taskId)
    {
        $result = $this->repository->findWhere(['project_id'=>$id, 'id'=>$taskId]);
        if(isset($result['data']) && count($result['data']) == 1){
            $result = [
                'data' => $result['data'][0]
            ];
        }

        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id, $idTask)
    {
        $data = $request->all();
        $data['project_id'] = $id;
        return $this->service->update($request->all(), $idTask);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, $idTask)
    {
        if($this->repository->delete($idTask)){
            return ['success' => true];
        }
        return ['error' => '404', 'message' => 'Object Not found'];
    }
}
