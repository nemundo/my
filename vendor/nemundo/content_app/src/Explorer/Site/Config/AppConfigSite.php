<?php

namespace Nemundo\Content\App\Explorer\Site\Config;

use Nemundo\Content\App\Explorer\Page\Config\AppConfigPage;
use Nemundo\Web\Site\AbstractSite;

class AppConfigSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'App';
        $this->url = 'app';
    }

    public function loadContent()
    {
        (new AppConfigPage())->render();
    }
}