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

    public function members(){
        return $this->belongsToMany(User::class, 'project_members', 'project_id', 'member_id');
    }

    public function clients(){
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function tasks(){
        return $this->hasMany(ProjectTask::class);
    }

    public function files(){
        return $this->hasMany(ProjectFile::class);
    }
}
