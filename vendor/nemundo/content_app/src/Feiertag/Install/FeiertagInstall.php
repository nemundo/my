<?php

namespace Nemundo\Content\App\Feiertag\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\Content\App\Feiertag\Application\FeiertagApplication;
use Nemundo\Content\App\Feiertag\Content\Feiertag\FeiertagContentType;
use Nemundo\Content\App\Feiertag\Data\FeiertagModelCollection;
use Nemundo\Content\App\Feiertag\Scheduler\FeiertagImportScheduler;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class FeiertagInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new FeiertagApplication());

        (new ModelCollectionSetup())
            ->addCollection(new FeiertagModelCollection());

        (new SchedulerSetup())
            ->addScheduler(new FeiertagImportScheduler());

        (new ContentTypeSetup(new FeiertagApplication()))
            ->addContentType(new FeiertagContentType());


    }
}