<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 19/08/2015
 * Time: 16:41
 */

namespace GerenciadorProjeto\Services;


use GerenciadorProjeto\Repositories\ProjectRepository;
use GerenciadorProjeto\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;


class ProjectService
{
    /*
     * @var ClientRepository
     */
    protected $repository;

    /**
     * @var ClientValidator
     */
    protected $validator;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $filesystem, Storage $storage){
        $this->repository = $repository;
        $this->validator = $validator;
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

    public function createFile(array $data){
        $project = $this->repository->skipPresenter()->find($data['project_id']);
        //dd($project);
        $projectFile = $project->files()->create($data);
        $this->storage->put( $projectFile->id.'.'.$data['extension'], $this->filesystem->get($data['file']) );

    }
}