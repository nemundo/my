<?php


namespace Nemundo\Content\App\Dashboard\Page;


use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Dashboard\Com\ListBox\UserDashboardListBox;
use Nemundo\Content\App\Dashboard\Content\UserDashboard\UserDashboardContentType;
use Nemundo\Content\Com\Container\ContentTypeSubmenuAddContainer;
use Nemundo\Content\Com\Container\SortableContentContainer;

class DashboardPage extends AbstractTemplateDocument
{

    public function getContent()
    {




        $btn=new AdminIconSiteButton($this);
        $btn->site=DashboardEditSite::$site;

        $layout=new BootstrapTwoColumnLayout($this);

        $reader=new DashboardReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        foreach ($reader->getData() as $dashboardRow) {

            $contentType=$dashboardRow->content->getContentType();

            $widget= new AdminWidget($layout->col1);
            $widget->widgetTitle=$contentType->getSubject();

            $contentType->getView($widget);

        }


        /*$type=new WikiPageContentType('addc985e-9cd0-4bcb-a54d-0ca3b05fd9db');
        //$type->getView($layout->col1);
        $editor=new CmsEditorContainer($layout->col1);
        $editor->editorName='left';
        $editor->contentType=$type;

        $type=new WikiPageContentType('e4b42912-ae54-4adb-b9e3-4a2463126435');
        //$type->getView($layout->col1);
        $editor=new CmsEditorContainer($layout->col2);
        $editor->editorName='right';
        $editor->contentType=$type;*/


        return parent::getContent();
    }

}