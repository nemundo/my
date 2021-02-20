<?php

namespace Nemundo\Content\App\ImageTimeline\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\ImageTimeline\Application\ImageTimelineApplication;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\ImageTimelineContentType;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimelineModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class ImageTimelineInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new ImageTimelineApplication());
        (new ModelCollectionSetup())->addCollection(new ImageTimelineModelCollection());

        (new ContentTypeSetup())
            ->addContentType(new ImageTimelineContentType());

    }
}