<?php

namespace Nemundo\Content\App\Timeline\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Timeline\Application\TimelineApplication;
use Nemundo\Content\App\Timeline\Data\TimelineModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\Project\Install\AbstractUninstall;

class TimelineUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new TimelineModelCollection());

    }
}