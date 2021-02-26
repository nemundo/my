<?php


namespace Nemundo\Content\Index\Tree\Site;


use Nemundo\Content\Index\Tree\Page\TreeAdminPage;
use Nemundo\Web\Site\AbstractSite;

class TreeAdminSite extends AbstractSite
{

    /**
     * @var TreeAdminSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Tree';
        $this->url = 'tree';

        TreeAdminSite::$site = $this;

        new ChildDeleteSite($this);

    }

    public function loadContent()
    {

        (new TreeAdminPage())->render();

        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Parent');
        $header->addText('Parent Subject');
        $header->addText('Parent Id');
        $header->addText('Child');
        $header->addText('Child Subject');
        $header->addText('Child Id');
        $header->addText('Item Order');

        $treeReader = new TreePaginationReader();
        $treeReader->model->loadParent();
        $treeReader->model->parent->loadContentType();
        $treeReader->model->loadChild();
        $treeReader->model->child->loadContentType();
        $treeReader->addOrder($treeReader->model->id, SortOrder::DESCENDING);
        $treeReader->paginationLimit = 50;


        foreach ($treeReader->getData() as $treeRow) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText($treeRow->parent->contentType->contentType);

            $contentType = $treeRow->parent->getContentType();
            $row->addText($contentType->getSubject());

            $row->addText($treeRow->parentId);


            $row->addText($treeRow->child->contentType->contentType);
            $contentType = $treeRow->child->getContentType();
            $row->addText($contentType->getSubject());
            $row->addText($treeRow->childId);
            $row->addText($treeRow->itemOrder);

        }

        $pagination = new BootstrapPagination($page);
        $pagination->paginationReader = $treeReader;

        $page->render();*/

    }

}