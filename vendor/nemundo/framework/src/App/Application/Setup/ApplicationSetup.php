<?php

namespace Nemundo\App\Application\Setup;


use Nemundo\App\Application\Data\Application\Application;
use Nemundo\App\Application\Data\Application\ApplicationCount;
use Nemundo\App\Application\Data\Application\ApplicationDelete;
use Nemundo\App\Application\Data\Application\ApplicationUpdate;
use Nemundo\App\Application\Data\Project\Project;
use Nemundo\App\Application\Data\Project\ProjectId;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Project\AbstractProject;

class ApplicationSetup extends AbstractBase
{


    protected $projectId;


    public function __construct(AbstractProject $project = null)
    {

        if ($project !== null) {

            $data = new Project();
            $data->updateOnDuplicate = true;
            $data->project = $project->project;
            $data->phpClass = $project->getClassName();
            $data->save();

            $id = new ProjectId();
            $id->filter->andEqual($id->model->phpClass, $project->getClassName());
            $this->projectId = $id->getId();

        }

    }


    public function addApplication(AbstractApplication $application)
    {

        if ($application->project !== null) {

            $data = new Project();
            $data->updateOnDuplicate = true;
            $data->project = $application->project->project;
            $data->phpClass = $application->project->getClassName();
            $data->save();

            $id = new ProjectId();
            $id->filter->andEqual($id->model->phpClass, $application->project->getClassName());
            $this->projectId = $id->getId();

        }


        $count = new ApplicationCount();
        $count->filter->andEqual($count->model->id, $application->applicationId);
        if ($count->getCount() == 0) {
            $data = new Application();
            $data->id = $application->applicationId;
            $data->projectId = $this->projectId;
            $data->application = $application->application;
            $data->applicationClass = $application->getClassName();
            $data->setupStatus = true;
            $data->install = false;
            $data->save();
        } else {
            $update = new ApplicationUpdate();
            $update->projectId = $this->projectId;
            $update->application = $application->application;
            $update->applicationClass = $application->getClassName();
            $update->setupStatus = true;
            $update->updateById($application->applicationId);
        }

        return $this;

    }


    public function removeApplication(AbstractApplication $application)
    {

        (new ApplicationDelete())->deleteById($application->applicationId);

    }


    public function resetSetupStatus()
    {

        $update = new ApplicationUpdate();
        $update->setupStatus = false;
        $update->update();

    }


    public function removeUnusedApplication()
    {

        $delete = new ApplicationDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

    }

}