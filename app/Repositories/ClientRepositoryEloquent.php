<?php 
namespace GerenciadorProjeto\Repositories;


use GerenciadorProjeto\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

/**
* 
*/
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository{
	
	public function model(){
		return Client::class;
	}
}

?>