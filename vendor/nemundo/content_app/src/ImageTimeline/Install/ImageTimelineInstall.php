<?php

namespace Nemundo\Content\App\ImageTimeline\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\Content\App\ImageTimeline\Application\ImageTimelineApplication;
use Nemundo\Content\App\ImageTimeline\Content\Image\ImageContentType;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\ImageTimelineContentType;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimelineModelCollection;
use Nemundo\Content\App\ImageTimeline\Scheduler\ImageTimelineScheduler;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ImageTimelineInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())->addApplication(new ImageTimelineApplication());
        (new ModelCollectionSetup())->addCollection(new ImageTimelineModelCollection());

        (new ContentTypeSetup(new ImageTimelineApplication()))
            ->addContentType(new ImageTimelineContentType())
            ->addContentType(new ImageContentType());

        (new SchedulerSetup(new ImageTimelineApplication()))
            ->addScheduler(new ImageTimelineScheduler());


        /* (new ContentTypeSetup())
             ->addContentType(new BielenContentType())
             ->addContentType(new EumetsatContentType());
 */

        /*  (new BielenContentType())->saveType();
          (new EumetsatContentType())->saveType();
  */

    }
}