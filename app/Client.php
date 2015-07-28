<?php

namespace GerenciadorProjeto;

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
