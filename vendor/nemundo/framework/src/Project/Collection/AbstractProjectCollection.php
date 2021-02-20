<?php

namespace Nemundo\Project\Collection;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Sorting\SortingListOfObject;
use Nemundo\Project\AbstractProject;

abstract class AbstractProjectCollection extends AbstractBaseClass
{

    /**
     * @var AbstractProject[]
     */
    private $projectList = [];

    abstract protected function loadProjectCollection();


    public function __construct()
    {
        $this->loadProjectCollection();
    }


    protected function addProject(AbstractProject $project)
    {
        $this->projectList[] = $project;
        return $this;
    }


    /**
     * @return AbstractProject[]
     */
    public function getProjectList()
    {

        $sorting = new SortingListOfObject();
        $sorting->objectList = $this->projectList;
        $sorting->sortingProperty = 'project';
        $sortedList = $sorting->getSortedListOfObject();

        return $sortedList;

    }

}