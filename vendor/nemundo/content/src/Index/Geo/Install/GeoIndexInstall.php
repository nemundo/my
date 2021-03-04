<?php


namespace Nemundo\Content\Index\Geo\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Index\Geo\Action\KmlContentAction;
use Nemundo\Content\Index\Geo\Application\GeoApplication;
use Nemundo\Content\Index\Geo\Data\GeoModelCollection;
use Nemundo\Content\Index\Geo\Scheduler\DistanceScheduler;
use Nemundo\Content\Index\Geo\Script\GeoIndexCleanScript;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class GeoIndexInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new GeoApplication());

        (new ModelCollectionSetup())
            ->addCollection(new GeoModelCollection());

        (new ScriptSetup(new GeoApplication()))
            ->addScript(new GeoIndexCleanScript());

        (new SchedulerSetup())
            ->addScheduler(new DistanceScheduler());


        (new ContentActionSetup())
            ->addContentAction(new KmlContentAction());

    }

}