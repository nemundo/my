<?php


namespace Nemundo\Content\App\Dashboard\Page;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Com\Container\AbstractRestrictedUserHtmlContainer;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\App\Dashboard\Site\Edit\ContentNewSite;
use Nemundo\Content\App\Dashboard\Site\Edit\DashboardEditSite;
use Nemundo\Content\App\Dashboard\Site\Edit\DashboardNewSite;
use Nemundo\Content\App\Dashboard\Usergroup\DashboardAdministratorUsergroup;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;


class DashboardWildcardPage extends AbstractTemplateDocument
{

    public $dashboardId;


    public function getContent()
    {

        $dashboardContentType = new DashboardContentType($this->dashboardId);

        $div= new AbstractRestrictedUserHtmlContainer($this);  // new Paragraph() Div($this);
        $div->restricted = true;
        $div->addRestrictedUsergroup(new DashboardAdministratorUsergroup());


        $btn = new AdminIconSiteButton($div);
        $btn->site = clone(DashboardEditSite::$site);
        $btn->site->addParameter(new ContentParameter($dashboardContentType->getContentId()));

        $btn = new AdminIconSiteButton($div);
        $btn->site = clone(DashboardNewSite::$site);
        $btn->site->addParameter(new ContentParameter($dashboardContentType->getContentId()));








        $dashboardContentType->getDefaultView($this);

        return parent::getContent();

    }

}