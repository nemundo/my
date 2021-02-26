<?php

namespace Nemundo\Content\App\Stream\Site;

use Nemundo\Content\App\Stream\Page\StreamConfigPage;
use Nemundo\Web\Site\AbstractSite;

class StreamConfigSite extends AbstractSite
{

    /**
     * @var StreamConfigSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Stream Config';
        $this->url = 'stream-config';

        StreamConfigSite::$site=$this;

    }

    public function loadContent()
    {
        (new StreamConfigPage())->render();
    }
}