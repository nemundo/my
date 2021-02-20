<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Page\ExplorerMobilePage;
use Nemundo\Web\Site\AbstractSite;

class ExplorerMobileSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Mobile';
        $this->url = 'mobile';
    }

    public function loadContent()
    {
        (new ExplorerMobilePage())->render();
    }
}