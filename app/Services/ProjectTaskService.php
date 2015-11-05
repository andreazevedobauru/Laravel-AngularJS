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
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;


class ProjectTaskService
{
    /*
     * @var ProjectTaskRepository
     */
    protected $repository;

    /*
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * @var ProjectTaskValidator
     */
    protected $validator;

    public function __construct(ProjectTaskRepository $repository,
                                ProjectRepository $projectRepository,
                                ProjectTaskValidator $validator){
        $this->repository = $repository;
        $this->projectRepository = $projectRepository;
        $this->validator = $validator;

    }

    public function create(array $data){
        try{
            $this->validator->with($data)->passesOrFail();

            $project = $this->projectRepository->skipPresenter()->find($data['project_id']);
            $projectTask = $project->tasks()->create($data);

            return $projectTask;
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

    public function delete($id){
        $projectTask = $this->repository->skipPresenter()->find($id);
        return $projectTask->delete();
    }

    public function isMember(array $data, $id){

    }

/*- addMember: para adicionar um novo member em um projeto
- removeMember: para remover um membro de um projeto
- isMember: para verificar se um usuário é membro de um determinado projeto
*/

}