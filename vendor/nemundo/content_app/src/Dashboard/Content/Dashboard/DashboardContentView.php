<?php

namespace Nemundo\Content\App\Dashboard\Content\Dashboard;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Index\Tree\Reader\ChildContentTypeReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class DashboardContentView extends AbstractContentView
{
    /**
     * @var DashboardContentType
     */
    public $contentType;

    public function getContent()
    {


        $row=new BootstrapRow($this);

        $child = new ChildContentTypeReader();
        $child->contentType = $this->contentType;
        foreach ($child->getData() as $contentTypeChild) {

            if ($contentTypeChild->hasView()) {
                $contentTypeChild->getDefaultView($row);
            }

            /*
            $widget = new AdminWidget($this);
            $widget->widgetTitle = $contentTypeChild->getSubject();

            if ($contentTypeChild->hasView()) {
                $contentTypeChild->getDefaultView($widget);
            }*/

        }


        /*
        $child = new ChildContentTypeReader();
        $child->contentType = $this->contentType;
        foreach ($child->getData() as $contentTypeChild) {

            $widget = new AdminWidget($this);
            $widget->widgetTitle = $contentTypeChild->getSubject();

            if ($contentTypeChild->hasView()) {
                $contentTypeChild->getDefaultView($widget);
            }

        }*/

        return parent::getContent();
    }
}