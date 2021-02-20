<?php

namespace Nemundo\Content\App\Dashboard\Content\UserDashboard;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Index\Tree\Reader\ChildContentTypeReader;
use Nemundo\Content\View\AbstractContentView;

class UserDashboardContentView extends AbstractContentView
{

    /**
     * @var UserDashboardContentType
     */
    public $contentType;

    public function getContent()
    {

        $title = new AdminTitle($this);
        $title->content = $this->contentType->getDataRow()->dashboard;

        $child=new ChildContentTypeReader();
        $child->contentType=$this->contentType;
        foreach ($child->getData() as $contentTypeChild) {

            $widget = new AdminWidget($this);
            $widget->widgetTitle = $contentTypeChild->getSubject();

            if ($contentTypeChild->hasView()) {
                $contentTypeChild->getDefaultView($widget);
            }


        }



        /*
        foreach ($this->contentType->getChild() as $contentRow) {

            $contentType = $contentRow->child->getContentType();
            if ($contentType->hasView()) {

                $widget = new AdminWidget($this);
                $widget->widgetTitle = $contentType->getSubject();
                if ($contentType->hasView()) {
                    $contentType->getDefaultView($widget);
                }

            }

        }*/

        return parent::getContent();
    }
}