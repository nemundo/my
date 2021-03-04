<?php

namespace Nemundo\Content\App\Dashboard\Site;

use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardReader;
use Nemundo\Content\App\Dashboard\Site\Edit\ContentNewSite;
use Nemundo\Content\App\Dashboard\Site\Edit\DashboardEditSite;
use Nemundo\Content\App\Dashboard\Site\Edit\DashboardNewSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\PlainSite;


class DashboardSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Dashboard';
        $this->url = 'dashboard';

        $reader = new DashboardReader();
        $reader->filter->andEqual($reader->model->active,true);
        $reader->addOrder($reader->model->dashboard);
        foreach ($reader->getData() as $dashboardRow) {

            $site = new PlainSite($this);
            $site->title = $dashboardRow->dashboard;
            $site->url = $dashboardRow->url;

        }

        new DashboardWildcardSite($this);
        new DashboardEditSite($this);
        new DashboardNewSite($this);

        //new ContentNewSite($this);
        //new ContentNewSite($this);

    }


    public function loadContent()
    {

    }

}