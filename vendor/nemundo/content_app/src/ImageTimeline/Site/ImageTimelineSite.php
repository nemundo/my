<?php

namespace Nemundo\Content\App\ImageTimeline\Site;

use Nemundo\Content\App\ImageTimeline\Page\ImageTimelinePage;
use Nemundo\Web\Site\AbstractSite;

class ImageTimelineSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Image Timeline';
        $this->url = 'image-timeline';
    }

    public function loadContent()
    {
        (new ImageTimelinePage())->render();
    }
}