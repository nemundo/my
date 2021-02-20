<?php

namespace Nemundo\Content\App\Timeline\Site;

use Nemundo\Content\App\Timeline\Page\TimelinePage;
use Nemundo\Web\Site\AbstractSite;

class TimelineSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Timeline';
        $this->url = 'timeline';

        new ItemSite($this);

    }

    public function loadContent()
    {
        (new TimelinePage())->render();
    }
}