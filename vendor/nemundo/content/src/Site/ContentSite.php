<?php


namespace Nemundo\Content\Site;


use Nemundo\Content\Index\Tree\Site\ContentRemoveSite;
use Nemundo\Content\Index\Tree\Site\ViewEditSite;
use Nemundo\Content\Page\ContentPage;
use Nemundo\Web\Site\AbstractSite;

class ContentSite extends AbstractSite
{

    /**
     * @var ContentSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Content';
        $this->url = 'content';

        ContentSite::$site = $this;

        new ContentViewSite($this);
        new ContentNewSite($this);
        new ContentEditSite($this);
        new ContentDeleteSite($this);
        new ContentActionSite($this);
        new ContentRemoveSite($this);

        new ViewEditSite($this);

    }

    public function loadContent()
    {

        (new ContentPage())->render();

    }


}