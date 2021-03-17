<?php

namespace Nemundo\Content\App\Explorer\Site\Config;

use Nemundo\Content\App\Explorer\Page\Config\ConfigPage;
use Nemundo\Web\Site\AbstractSite;

class ContentTypeConfigSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Content Type';
        $this->url = 'content-type';
    }

    public function loadContent()
    {
        (new ConfigPage())->render();
    }
}