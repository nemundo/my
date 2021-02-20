<?php

namespace Nemundo\Content\App\Dashboard\Site;

use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboardReader;
use Nemundo\Content\App\Dashboard\Page\UserDashboardPage;
use Nemundo\Content\App\Dashboard\Parameter\UserDashboardParameter;
use Nemundo\Content\App\Dashboard\Site\Edit\UserDashboardEditSite;
use Nemundo\User\Session\UserSession;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;



class UserDashboardSite extends AbstractSite
{

    /**
     * @var UserDashboardSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'User Dashboard';
        $this->url = 'user-dashboard';

        UserDashboardSite::$site=$this;

        new UserDashboardEditSite($this);


    }

    public function loadContent()
    {

        $parameter=new UserDashboardParameter();
        if ($parameter->notExists()) {

            $reader = new UserDashboardReader();
            $reader->filter->andEqual($reader->model->userId, (new UserSession())->userId);
            $reader->addOrder($reader->model->dashboard);
            $reader->limit = 1;
            foreach ($reader->getData() as $dashboardRow) {
                $parameter->setValue($dashboardRow->id);
            }

            $site=clone(UserDashboardSite::$site);
            $site->addParameter($parameter);
            $site->redirect();

        }

        (new UserDashboardPage())->render();

    }

}