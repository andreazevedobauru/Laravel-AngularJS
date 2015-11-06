<?php

namespace GerenciadorProjeto\Presenters;

use GerenciadorProjeto\Transformers\ProjectTaskTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectTaskPresenter extends FractalPresenter
{

    public function getTransformer(){
        return new ProjectTaskTransformer();
    }
}
