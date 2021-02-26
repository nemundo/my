<?php

namespace Nemundo\Content\Index\Tree\Site;


use Nemundo\Content\Index\Tree\Page\ViewEditPage;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Web\Site\AbstractSite;

class ViewEditSite extends AbstractEditIconSite
{

    /**
     * @var ViewEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'View Edit';
        $this->url = 'view-edit';
        //$this->menuActive=false;

        ViewEditSite::$site=$this;
    }

    public function loadContent()
    {

        (new ViewEditPage())->render();

    }
}