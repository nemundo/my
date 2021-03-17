<?php


namespace Nemundo\Content\App\Dashboard\Page\Admin;


use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardEditSite;
use Nemundo\Content\App\Dashboard\Template\DashboardAdminTemplate;


class DashboardNewPage extends DashboardAdminTemplate
{

    public function getContent()
    {


        $form = (new DashboardContentType())->getDefaultForm($this);
        $form->redirectSite = clone(DashboardEditSite::$site);
        $form->appendContentParameter = true;


        return parent::getContent();

    }

}