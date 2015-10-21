<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 19/08/2015
 * Time: 16:41
 */

namespace GerenciadorProjeto\Services;


use GerenciadorProjeto\Repositories\ProjectFileRepository;
use GerenciadorProjeto\Repositories\ProjectRepository;
use GerenciadorProjeto\Validators\ProjectFileValidator;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectFileService
{
    /*
     * @var ProjectFileRepository
     */
    protected $repository;

    /*
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * @var ProjectFileValidator
     */
    protected $validator;

    /*
     * @var Filesystem
     */
    protected $filesystem;

    /*
     * @var Storage
     */
    protected $storage;

    public function __construct(ProjectFileRepository $repository, ProjectFileValidator $validator,
                                ProjectRepository $projectRepository,
                                Filesystem $filesystem,
                                Storage $storage){
        $this->repository = $repository;
        $this->validator = $validator;
        $this->projectRepository = $projectRepository;
        $this->filesystem = $filesystem;
        $this->storage = $storage;

    }

    public function create(array $data){
        try{
            $this->validator->with($data)->passesOrFail();

            $project = $this->projectRepository->skipPresenter()->find($data['project_id']);
            $projectFile = $project->files()->create($data);

            $this->storage->put($projectFile->id . "." . $data['extension'], $this->filesystem->get($data['file']));

            return $projectFile;
        }catch( ValidatorException $e ){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id){
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }catch( ValidatorException $e ){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function getFilePath($id){
        $projectFile = $this->repository->skipPresenter()->find($id);
        return $this->getBaseURL($projectFile);
    }

    public function getBaseURL($projectFile){
        switch ($this->storage->getDefaultDriver()){
            case 'local':
                return $this->storage->getDefaultDriver()->getAdapter()->getPathPrefix().'/'.$projectFile->id . '.' . $projectFile->extension;
        }
    }

    public function checkProjectOwner($projectFileId){
        $userId     = \Authorizer::getResourceOwnerId();
        $projectId = $this->repository->skipPresenter()->find($projectFileId)->project_id;

        return $this->projectRepository->isOwner($projectId, $userId);
    }

    public function checkProjectMember($projectFileId){
        $userId     = \Authorizer::getResourceOwnerId();
        $projectId = $this->repository->skipPresenter()->find($projectFileId)->project_id;

        return $this->projectRepository->hasMember($projectId, $userId);
    }

    public function checkProjectPermissions($projectFileId){

        if($this->checkProjectOwner($projectFileId) || $this->checkProjectMember($projectFileId)){
            return true;
        }

        return false;
    }

    public function checkExist($id){
        if($this->repository->find($id)){
            return true;
        }else{
            return false;
        }
    }

    public function checks($id){
        if($this->checkProjectPermissions($id) == false || $this->checkExist($id) == false){
            return false;
        }

        return true;
    }
}