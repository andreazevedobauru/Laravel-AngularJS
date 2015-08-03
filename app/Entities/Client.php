<?php

namespace GerenciadorProjeto\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	'name',
    	'responsible',
    	'email',
    	'telefone',
    	'address',
    	'obs'
    ];
}
