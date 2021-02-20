<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\Calendar\Com\Container\CalendarContainer;
use Nemundo\Content\App\Explorer\Com\Breadcrumb\ExplorerTreeBreadcrumb;
use Nemundo\Content\App\Explorer\Com\Dropdown\MenuDropdown;
use Nemundo\Content\App\Explorer\Site\NewSite;
use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\App\Log\Com\Container\LogContainer;
use Nemundo\Content\Com\Container\ContentChildContainer;
use Nemundo\Content\Com\Container\ContentTypeSubmenuAddContainer;
use Nemundo\Content\Com\Dropdown\ContentTypeCollectionSubmenuDropdown;
use Nemundo\Content\Com\Dropdown\ContentTypeDropdown;
use Nemundo\Content\Com\Form\ContentViewChangeForm;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Index\Geo\Com\Container\GeoIndexContainer;
use Nemundo\Content\Index\Group\Type\GroupIndexTrait;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Index\Tree\Com\Table\ParentTreeTable;
use Nemundo\Content\Index\Tree\Type\TreeIndexTrait;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Db\Sql\Field\CountField;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Header\Title;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\Site;


class ItemPage extends ExplorerTemplate
{

    public function getContent()
    {

        $contentType = (new ContentParameter())->getContentType(false);



        $title = new Title($this);
        $title->content = $contentType->getSubject();

        if ($contentType->isObjectOfTrait(TreeIndexTrait::class)) {
            //$breadcrumb = new ExplorerTreeBreadcrumb($layout->col1);
            //$breadcrumb->contentType = $contentType;

            $breadcrumb = new TreeBreadcrumb($this);
            $breadcrumb->redirectSite = ItemSite::$site;
            $breadcrumb->addParentContentType($contentType);
            $breadcrumb->addActiveItem($contentType->getSubject());


        }


        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;

        if ($contentType->hasView()) {

            $widget = new AdminWidget($layout->col1);
            $widget->widgetTitle = $contentType->getSubject();

            $div = new BootstrapThreeColumnLayout($widget);
            $div->col1->columnWidth=1;
            $div->col2->columnWidth=1;
            $div->col3->columnWidth=2;

            if ($contentType->isObjectOfTrait(TreeIndexTrait::class)) {

                if ($contentType->allowChild) {

                if ($contentType->restrictedChild) {

                    $dropdown = new ContentTypeCollectionSubmenuDropdown($div->col1);   // new ContentTypeDropdown($div->col1);
                    $dropdown->redirectSite = clone(NewSite::$site);
                    $dropdown->redirectSite->addParameter(new ContentParameter());
                    foreach ($contentType->getRestrictedChildContentType() as $child) {
                        $dropdown->addContentType($child);
                    }

                } else {

                    $container = new ContentTypeSubmenuAddContainer($div->col1);
                    $container->parentId = $contentType->getContentId();
                    $container->redirectSite = clone(NewSite::$site);
                    $container->redirectSite->addParameter(new ContentParameter());

                }

                }

            }

            $dropdown = new MenuDropdown($div->col2);
            $dropdown->contentType = $contentType;

            $form = new ContentViewChangeForm($div->col3);
            $form->contentType = $contentType;
            $form->redirectSite = new Site();

            $p=new Paragraph($div->col3);
            $p->content = 'Type: '.$contentType->typeLabel;

            /*$view = new ContentChildContainer($widget);
            $view->contentType= $contentType;*/

            $contentType->getDefaultTreeView($widget);

        }


        $ul = new UnorderedList($layout->col2);

        $treeReader = new TreeReader();
        $treeReader->model->loadChild();
        $treeReader->model->child->loadContentType();
        $treeReader->filter->andEqual($treeReader->model->parentId, $contentType->getContentId());
        $treeReader->addGroup($treeReader->model->child->contentTypeId);
        $treeReader->addOrder($treeReader->model->child->contentType->contentType);

        $count = new CountField($treeReader);

        foreach ($treeReader->getData() as $treeRow) {
            $number = $treeRow->getModelValue($count);
            $ul->addText($treeRow->child->contentType->contentType . ' (' . $number . ')');

            /*
            $childContentType = $treeRow->child->contentType->getContentType();
            if ($childContentType->hasList()) {
                //$list = $childContentType->getList($layout->col2);
                //$list->parentId = $contentType->getContentId();
            }*/

        }


        $container = new TreeIndexContainer($layout->col2);
        $container->contentType = $contentType;
        $container->redirectSite = ItemSite::$site;

        $container = new GeoIndexContainer($layout->col2);
        $container->contentType = $contentType;
        $container->redirectSite = ItemSite::$site;

        $container = new LogContainer($layout->col2);
        $container->contentType = $contentType;


        if ($contentType->isObjectOfTrait(GroupIndexTrait::class)) {

            $subtitle = new AdminSubtitle($layout->col2);
            $subtitle->content = 'Group';

            $table = new AdminTable($layout->col2);

            $header = new TableRow($table);
            $header->addText('Group');

            foreach ($contentType->getUserList() as $userRow) {
                $row = new TableRow($table);
                $row->addText($userRow->login);
            }

        }

        $container = new CalendarContainer($layout->col2);
        $container->contentType = $contentType;

        if ($contentType->isObjectOfTrait(TreeIndexTrait::class)) {

            $ul = new UnorderedList($layout->col2);
            foreach ($contentType->getParentContent() as $contentCustomRow) {
                $ul->addText($contentCustomRow->subject);
            }

            $table = new ParentTreeTable($layout->col2);
            $table->contentType = $contentType;
            $table->redirectSite = ItemSite::$site;

        }

        return parent::getContent();

    }

}