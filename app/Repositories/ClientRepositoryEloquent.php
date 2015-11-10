<?php 
namespace GerenciadorProjeto\Repositories;


use GerenciadorProjeto\Entities\Client;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use GerenciadorProjeto\Presenters\ClientPresenter;

/**
* 
*/
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    protected $fieldSearchable =[
        'name'
    ];

	public function model(){
		return Client::class;
	}

	public function presenter(){
		return ClientPresenter::class;
	}

    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }
}

?>