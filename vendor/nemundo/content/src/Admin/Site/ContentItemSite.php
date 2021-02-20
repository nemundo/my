<?php


namespace Nemundo\Content\Admin\Site;


use Nemundo\Content\Admin\Page\ContentItemPage;
use Nemundo\Package\FontAwesome\Icon\ViewIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Site\AbstractSite;


class ContentItemSite extends AbstractIconSite
{

    /**
     * @var ContentItemSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'content-item';
        $this->icon=new ViewIcon();
        $this->menuActive = false;
        ContentItemSite::$site = $this;

        new ContentEditSite($this);

    }

    public function loadContent()
    {

        (new ContentItemPage())->render();

    }


}