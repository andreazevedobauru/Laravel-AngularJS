<?php

namespace GerenciadorProjeto\Http\Controllers;


use GerenciadorProjeto\Entities\ProjectFile;
use GerenciadorProjeto\Repositories\ProjectFileRepository;
use GerenciadorProjeto\Services\ProjectFileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectFileController extends Controller
{
    /**
     * @var ProjectFileService
     */

    private $service;
    /**
     * @var ProjectFileRepository
     */
    private $repository;

    public function __construct(ProjectFileRepository $repository, ProjectFileService $service){
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index($id)
    {
        
        return $this->repository->findWhere(['project_id' => $id]);
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
     * @return Response
     */
    public function store(Request $request)
    {

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        $data['file']      = $file;
        $data['extension'] = $extension;
        $data['name'] = $request->name;
        $data['project_id'] = $request->project_id;
        $data['description'] = $request->description;

        $this->service->create($data);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showFile($id)
    {
        if($this->service->checkProjectPermissions($id) == false){
            return ['error'=>'Access Forbidden'];
        }
        $filePath = $this->service->getFilePath($id);
        $fileContent = file_get_contents($filePath);
        $file64 = base64_encode($fileContent);

        return[
            'file' => $file64,
            'size' => filesize($filePath),
            'name' => $this->service->getFileName($id)
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if($this->service->checkProjectPermissions($id) == false){
            return ['error'=>'Access Forbidden'];
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
        if($this->service->checkProjectPermissions($id) == false){
            return ['error'=>'Access Forbidden'];
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
        return $this->repository->delete($id);
    }
}
