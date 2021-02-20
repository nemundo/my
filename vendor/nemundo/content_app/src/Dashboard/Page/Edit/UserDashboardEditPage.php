<?php


namespace Nemundo\Content\App\Dashboard\Page\Edit;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Dashboard\Com\Form\DashboardSearchForm;
use Nemundo\Content\App\Dashboard\Com\ListBox\UserDashboardListBox;
use Nemundo\Content\App\Dashboard\Content\UserDashboard\UserDashboardContentType;
use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboard;
use Nemundo\Content\App\Dashboard\Parameter\UserDashboardParameter;
use Nemundo\Content\App\Dashboard\Site\Edit\UserDashboardEditSite;
use Nemundo\Content\Com\Container\ContentTypeChildAdminContainer;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;


class UserDashboardEditPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout=new BootstrapTwoColumnLayout($this);

        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;

        new DashboardSearchForm($layout->col1);


        $widget=new AdminWidget($layout->col2);
        $widget->widgetTitle = 'New Dashboard';

        (new UserDashboardContentType())->getDefaultForm($widget);

        $userDashboardParameter = new UserDashboardParameter();
        if ($userDashboardParameter->hasValue()) {

            $contentType = new UserDashboardContentType($userDashboardParameter->getValue());
            //$contentType->getDefaultForm($layout->col2);

            $container = new ContentTypeChildAdminContainer($layout->col1);
            $container->contentType = $contentType;
            $container->redirectSite = clone(UserDashboardEditSite::$site);
            $container->redirectSite->addParameter(new UserDashboardParameter());

        }

        return parent::getContent();

    }

}