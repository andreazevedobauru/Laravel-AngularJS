<?php

namespace GerenciadorProjeto\Presenters;

use GerenciadorProjeto\Transformers\ProjectNoteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectNotePresenter extends  FractalPresenter
{
    public function getTransformer(){
        return new ProjectNoteTransformer();
    }
}