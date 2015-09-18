<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 19/08/2015
 * Time: 16:41
 */

namespace GerenciadorProjeto\Services;


use GerenciadorProjeto\Entities\ProjectTask;
use GerenciadorProjeto\Repositories\ProjectRepository;
use GerenciadorProjeto\Repositories\ProjectTaskRepository;
use GerenciadorProjeto\Validators\ProjectTaskValidator;
use GerenciadorProjeto\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;


class ProjectService
{
    /*
     * @var ProjectRepository
     */
    protected $repository;

    /**
     * @var ProjectValidator
     */
    protected $validator;

    /*
     * @var ProjectTaskRepository
     */
    protected $taskRepository;

    /**
     * @var ProjectTaskValidator
     */
    protected $taskValidator;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $filesystem, Storage $storage, ProjectTaskRepository $taskRepository, ProjectTaskValidator $taskValidator){
        $this->repository = $repository;
        $this->validator = $validator;
        $this->taskRepository = $taskRepository;
        $this->taskvalidator = $taskValidator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }

    public function create(array $data){
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
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

    public function addMember(array $data, $id){
        try{
            $this->taskValidator->with($data)->passesOrFail();
            return $this->taskRepository->create($data);
        }catch( ValidatorException $e ){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function removeMember(array $data, $id){

    }

    public function isMember(array $data, $id){

    }

/*- addMember: para adicionar um novo member em um projeto
- removeMember: para remover um membro de um projeto
- isMember: para verificar se um usuário é membro de um determinado projeto
*/
    public function createFile(array $data){
        $project = $this->repository->skipPresenter()->find($data['project_id']);
        //dd($project);
        $projectFile = $project->files()->create($data);
        $this->storage->put( $projectFile->id.'.'.$data['extension'], $this->filesystem->get($data['file']) );

    }
}