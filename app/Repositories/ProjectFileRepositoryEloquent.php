<?php 
namespace GerenciadorProjeto\Repositories;


use GerenciadorProjeto\Entities\Client;
use GerenciadorProjeto\Entities\ProjectFile;
use Prettus\Repository\Eloquent\BaseRepository;
use GerenciadorProjeto\Presenters\ClientPresenter;

/**
* 
*/
class ProjectFileRepositoryEloquent extends BaseRepository implements ProjectFileRepository{
	
	public function model(){
		return ProjectFile::class;
	}

	public function presenter(){
		return ProjectFilePresenter::class;
	}
}

?>