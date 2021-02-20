<?php

namespace Nemundo\Content\App\ImageTimeline\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimelineModelCollection;
use Nemundo\Content\App\ImageTimeline\Site\ImageTimelineSite;

class ImageTimelineApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Image Timeline';
        $this->applicationId = 'f815d7a6-09bf-4360-8fcf-c1e20fa1f4cd';
        $this->modelCollectionClass = ImageTimelineModelCollection::class;
        $this->installClass = ImageTimelineModelCollection::class;
        $this->siteClass = ImageTimelineSite::class;
    }
}