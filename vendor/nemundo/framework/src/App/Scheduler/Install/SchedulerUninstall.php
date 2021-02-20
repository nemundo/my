<?php

namespace Nemundo\App\Scheduler\Install;

use Nemundo\App\Scheduler\Data\SchedulerModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractUninstall;


class SchedulerUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new SchedulerModelCollection());

    }


}