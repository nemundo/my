<?php


namespace Nemundo\Content\App\Dashboard\Site\Edit;


use Nemundo\Content\App\Dashboard\Page\Edit\ContentNewPage;
use Nemundo\Content\App\Dashboard\Page\Edit\DashboardEditPage;
use Nemundo\Content\App\Dashboard\Page\Edit\DashboardNewPage;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Icon\PlusIcon;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;


class DashboardNewSite extends AbstractIconSite //EditIconSite
{

    /**
     * @var DashboardNewSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Dashboard New';
        $this->url = 'dashboard-new';
        $this->menuActive = false;
        $this->icon = new PlusIcon();


        DashboardNewSite::$site = $this;

    }


    public function loadContent()
    {

        (new DashboardNewPage())->render();

    }

}