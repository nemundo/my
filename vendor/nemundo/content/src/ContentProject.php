<?php


namespace Nemundo\Content;


use Nemundo\Project\AbstractProject;

class ContentProject extends AbstractProject
{

    protected function loadProject()
    {

        $this->project = 'Content';
        $this->projectName = 'content';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR;

    }

}