<?php


namespace Nemundo\App\Application\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\Application\Site\ApplicationSite;
use Nemundo\App\Scheduler\Site\SchedulerSite;
use Nemundo\Com\Template\AbstractTemplateDocument;

class ApplicationTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site =ApplicationSite::$site;

    }

}