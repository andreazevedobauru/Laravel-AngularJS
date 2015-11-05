<?php

namespace GerenciadorProjeto\Http\Middleware;

use Closure;
use GerenciadorProjeto\Services\ProjectService;

class CheckProjectPermission
{
    /*
     * @var ProjectService
     */
    protected $service;

    public function __construct(ProjectService $service){
        $this->service = $service;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $projectId  = $request->route('id') ? $request->route('id') : $request->route('project');

        if($this->service->checkProjectOwner($projectId) == false){
            return ['error'=> 'You haven\'t permission to access project'];
        }

        return $next($request);
    }
}
