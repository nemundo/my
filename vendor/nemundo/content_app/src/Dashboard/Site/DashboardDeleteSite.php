<?php


namespace Nemundo\Content\App\Dashboard\Site;


use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardDelete;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboardDelete;
use Nemundo\Content\App\Dashboard\Parameter\DashboardParameter;
use Nemundo\Core\Http\Url\UrlReferer;

class DashboardDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var DashboardDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Delete';
        $this->url = 'delete';
        $this->menuActive = false;

        DashboardDeleteSite::$site = $this;

    }


    public function loadContent()
    {

        $dashboardId = (new DashboardParameter())->getValue();
        //(new UserDashboardDelete())->deleteById($dashboardId);
        (new DashboardDelete())->deleteById($dashboardId);

        (new UrlReferer())->redirect();


    }

}