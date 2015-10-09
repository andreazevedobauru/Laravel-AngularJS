<?php

namespace GerenciadorProjeto\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model
{
    use TransformableTrait;

    protected $fillable = [
    	'nome',
    	'responsible',
    	'email',
    	'telefone',
    	'address',
    	'obs'
    ];

    public function projects(){
        return $this->belongsToMany(Project::class/*, 'projects', 'client_id', 'id'*/);
    }
}
