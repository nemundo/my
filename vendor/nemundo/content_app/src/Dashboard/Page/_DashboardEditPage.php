<?php


namespace Nemundo\Content\App\Dashboard\Page;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardReader;
use Nemundo\Content\App\Dashboard\Event\DashboardEvent;
use Nemundo\Content\App\Dashboard\Parameter\DashboardParameter;
use Nemundo\Content\App\Dashboard\Site\DashboardDeleteSite;
use Nemundo\Content\App\Dashboard\Site\DashboardEditSite;
use Nemundo\Content\Com\Container\ContentTypeAddContainer;
use Nemundo\Content\Com\Container\ContentTypeSubmenuAddContainer;
use Nemundo\Content\Com\Dropdown\ContentTypeSubmenuDropdown;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

use Nemundo\Process\Cms\Com\Container\CmsEditorContainer;

class __DashboardEditPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $container=new ContentTypeSubmenuAddContainer($this);
        $container->addEvent(new DashboardEvent());

        $layout=new BootstrapTwoColumnLayout($this);

        $reader=new DashboardReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        foreach ($reader->getData() as $dashboardRow) {

            $contentType=$dashboardRow->content->getContentType();

            $widget= new AdminWidget($layout->col1);
            $widget->widgetTitle=$contentType->getSubject();

            $contentType->getDefaultView($widget);

            $btn = new AdminIconSiteButton($widget);
            $btn->site = clone(DashboardDeleteSite::$site);
            $btn->site->addParameter(new DashboardParameter($dashboardRow->id));

        }

        return parent::getContent();

    }

}