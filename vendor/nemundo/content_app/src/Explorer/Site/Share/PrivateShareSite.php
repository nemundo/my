<?php

namespace Nemundo\Content\App\Explorer\Site\Share;

use Nemundo\Content\App\Explorer\Page\Share\PrivateSharePage;
use Nemundo\Web\Site\AbstractSite;

class PrivateShareSite extends AbstractSite
{

    /**
     * @var PublicShareEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Send Message (Private Share)';
        $this->url = 'private-share-edit';
        $this->menuActive = false;
        PrivateShareSite::$site = $this;
    }

    public function loadContent()
    {

        (new PrivateSharePage())->render();

    }
}