<?php

namespace Nemundo\Content\App\Explorer\Site\Config;

use Nemundo\Web\Site\AbstractSite;

class ConfigSite extends AbstractSite
{
    protected function loadSite()
    {

        $this->title = 'Config';
        $this->url = 'config';

        new ContentTypeConfigSite($this);
        //new AppConfigSite($this);

    }

    public function loadContent()
    {
       // (new ConfigPage())->render();
    }
}