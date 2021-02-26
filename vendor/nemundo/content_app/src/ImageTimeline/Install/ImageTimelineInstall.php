<?php

namespace Nemundo\Content\App\ImageTimeline\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\Content\App\ImageTimeline\Application\ImageTimelineApplication;
use Nemundo\Content\App\ImageTimeline\Content\Bielen\BielenContentType;
use Nemundo\Content\App\ImageTimeline\Content\Bielen\EumetsatContentType;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\ImageTimelineContentType;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimelineModelCollection;
use Nemundo\Content\App\ImageTimeline\Scheduler\ImageTimelineScheduler;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class ImageTimelineInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())->addApplication(new ImageTimelineApplication());
        (new ModelCollectionSetup())->addCollection(new ImageTimelineModelCollection());

        (new ContentTypeSetup(new ImageTimelineApplication()))
            ->addContentType(new ImageTimelineContentType());

        (new SchedulerSetup(new ImageTimelineApplication()))
            ->addScheduler(new ImageTimelineScheduler());


        /* (new ContentTypeSetup())
             ->addContentType(new BielenContentType())
             ->addContentType(new EumetsatContentType());
 */

        (new BielenContentType())->saveType();
        (new EumetsatContentType())->saveType();


    }
}