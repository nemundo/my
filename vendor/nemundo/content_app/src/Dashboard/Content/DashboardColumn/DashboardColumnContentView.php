<?php

namespace Nemundo\Content\App\Dashboard\Content\DashboardColumn;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\Index\Tree\Reader\ChildContentTypeReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;

class DashboardColumnContentView extends AbstractContentView
{
    /**
     * @var DashboardColumnContentType
     */
    public $contentType;

    public function getContent()
    {

        $columnRow = $this->contentType->getDataRow();

        $column = new BootstrapColumn($this);
        $column->columnWidth = $columnRow->columnWidth;

        $child = new ChildContentReader();  // new ChildContentTypeReader();
        $child->contentType = $this->contentType;
        foreach ($child->getData() as $treeRow) {

            $contentTypeChild = $treeRow->child->getContentType();

            $widget = new AdminWidget($column);
            $widget->widgetTitle =  $contentTypeChild->getSubject();

            if ($contentTypeChild->hasView()) {
                //$contentTypeChild->getDefaultView($widget);
                $contentTypeChild->getView($treeRow->viewId,$widget);

            }

        }


        return parent::getContent();
    }
}