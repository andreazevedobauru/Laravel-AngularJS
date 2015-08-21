<?php

namespace GerenciadorProjeto\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Project extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'owner_id',
        'client_id',
        'nome',
        'description',
        'status',
        'progress',
        'due_date'
    ];

    public  function notes(){
        return $this->hasMany(ProjectNote::class);
    }

}
