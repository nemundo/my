<?php

namespace Nemundo\Admin\Controller;


use Nemundo\Admin\Site\AdminHomeSite;
use Nemundo\Web\Controller\AbstractWebController;
use Nemundo\Web\Site\AbstractSite;


class AdminController extends AbstractWebController
{

    /**
     * @var AbstractSite[]
     */
    private static $adminSiteList = [];


    // addAdminSiteClass
    public static function addAdminSite(AbstractSite $site)
    {
        AdminController::$adminSiteList[] = $site;
    }


    protected function loadController()
    {

        new AdminHomeSite($this);

        foreach (AdminController::$adminSiteList as $site) {
            $this->addSite($site);
        }

    }

}