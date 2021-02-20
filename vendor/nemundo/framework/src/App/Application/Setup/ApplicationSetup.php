<?php

namespace Nemundo\App\Application\Setup;


use Nemundo\App\Application\Data\Application\Application;
use Nemundo\App\Application\Data\Application\ApplicationCount;
use Nemundo\App\Application\Data\Application\ApplicationDelete;
use Nemundo\App\Application\Data\Application\ApplicationUpdate;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Core\Base\AbstractBase;

class ApplicationSetup extends AbstractBase
{

    public function addApplication(AbstractApplication $application)
    {

        $count = new ApplicationCount();
        $count->filter->andEqual($count->model->id, $application->applicationId);
        if ($count->getCount() == 0) {
            $data = new Application();
            $data->id = $application->applicationId;
            $data->application = $application->application;
            $data->applicationClass = $application->getClassName();
            $data->setupStatus = true;
            $data->install = false;
            $data->save();
        } else {
            $update = new ApplicationUpdate();
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