<?php

namespace GerenciadorProjeto\Http\Controllers;


use GerenciadorProjeto\Repositories\ProjectMemberRepository;
use GerenciadorProjeto\Services\ProjectMemberService;
use Illuminate\Http\Request;

use GerenciadorProjeto\Http\Requests;
use GerenciadorProjeto\Http\Controllers\Controller;

class ProjectMemberController extends Controller
{
    /**
     * @var ProjectMemberService
     */

    private $service;
    /**
     * @var ProjectMemberRepository
     */
    private $repository;

    public function __construct(ProjectMemberRepository $repository, ProjectMemberService $service){
        $this->repository = $repository;
        $this->service = $service;
        $this->middleware('check.project.owner', ['except'=>['index', 'show']]);
        $this->middleware('check.project.permission', ['except'=>['store', 'destroy']]);
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
    public function show($id, $idProjectMember)
    {
        return $this->repository->find($idProjectMember);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, $idProjectMember)
    {
        $this->service->delete($idProjectMember);
    }
}
