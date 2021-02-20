<?php

namespace Nemundo\Content\App\Feed\Site;

use Nemundo\Content\App\Feed\Page\WebCrawlerPage;
use Nemundo\Web\Site\AbstractSite;

class WebCrawlerSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Web Crawler';
        $this->url = 'web-crawler';
    }

    public function loadContent()
    {
        (new WebCrawlerPage())->render();
    }
}