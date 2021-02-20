<?php

namespace Nemundo\Project;


use Nemundo\Core\Base\AbstractBaseClass;

// nach Dev???
abstract class AbstractProject extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $project;

    /**
     * @var string
     */
    public $projectName;

    /**
     * @var string
     */
    public $namespace;

    /**
     * @var string
     */
    public $path;

    /**
     * @var string
     */
    //public $dbFilename;

    /**
     * @var string
     */
    public $modelPath;

    abstract protected function loadProject();

    public function __construct()
    {
        $this->loadProject();
    }

}