<?php

namespace Nemundo\Content\App\Dashboard\Content\DashboardColumn;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\Index\Tree\Reader\ChildContentTypeReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;
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

        $child = new ChildContentReader();
        $child->contentType = $this->contentType;
        foreach ($child->getData() as $treeRow) {

            $content = $treeRow->child->getContentType();

            //$widget = new AdminWidget($column);
            //$widget->widgetTitle =  $content->getSubject();

            if ($content->hasView()) {

                $widget = new ContentWidget($column);
                $widget->contentType = $content;
                $widget->showMenu=false;
                $widget->editable=false;
                $widget->viewId=$treeRow->viewId;
                //$widget->loadAction=true;
                $widget->redirectSite = $this->redirectSite;


                //$p=new Paragraph($column);
                //$p->content = 'view id:'. $treeRow->viewId;


                //$content->getView($treeRow->viewId,$widget);

            }

        }


        return parent::getContent();
    }
}