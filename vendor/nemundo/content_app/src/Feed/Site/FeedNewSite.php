<?php

namespace Nemundo\Content\App\Feed\Site;

use Nemundo\Content\App\Feed\Page\FeedNewPage;
use Nemundo\Web\Site\AbstractSite;

class FeedNewSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'New';
        $this->url = 'new';
    }

    public function loadContent()
    {
        (new FeedNewPage())->render();
    }
}