<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 27/08/2015
 * Time: 17:28
 */

namespace GerenciadorProjeto\Presenters;

use GerenciadorProjeto\Transformers\ProjectFileTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectFilePresenter extends  FractalPresenter
{
    public function getTransformer(){
        return new ProjectFileTransformer();
    }
}