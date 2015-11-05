<?php

namespace GerenciadorProjeto\Http\Controllers;

use GerenciadorProjeto\Entities\ProjectNote;
use GerenciadorProjeto\Repositories\ProjectNoteRepository;
use GerenciadorProjeto\Services\ProjectNoteService;
use GerenciadorProjeto\Services\ProjectService;
use Illuminate\Http\Request;


class ProjectNoteController extends Controller
{
    /**
     * @var ProjectNoteService
     */

    private $service;
    /**
     * @var ProjectNoteRepository
     */
    private $repository;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service){
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
        return $this->repository->findWhere(['project_id'=>$id]);
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
    public function show($id, $noteId)
    {
        $result = $this->repository->findWhere(['project_id'=>$id, 'id'=>$noteId]);
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
    public function update(Request $request, $id, $idNote)
    {
        $data = $request->all();
        $data['project_id'] = $id;
        return $this->service->update($request->all(), $idNote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, $idNote)
    {
        if($this->repository->delete($idNote)){
            return ['success' => true];
        }
        return ['error' => '404', 'message' => 'Object Not found'];
    }
}
