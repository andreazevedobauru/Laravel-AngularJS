<?php 
namespace GerenciadorProjeto\Repositories;


use GerenciadorProjeto\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;
use GerenciadorProjeto\Presenters\ClientPresenter;

/**
* 
*/
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository{
	
	public function model(){
		return Client::class;
	}

	public function presenter(){
		return ClientPresenter::class;
	}
}

?>