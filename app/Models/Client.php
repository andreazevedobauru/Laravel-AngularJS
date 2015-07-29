<?php

namespace GerenciadorProjeto\Models;

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
