<?php

namespace Nemundo\Content\App\PublicShare\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;

use Nemundo\Content\App\PublicShare\Com\PublicShareUrlContainer;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicSharePaginationReader;
use Nemundo\Content\App\PublicShare\Parameter\PublicShareParameter;
use Nemundo\Content\App\PublicShare\Site\PublicShareDeleteSite;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class PublicShareAdminPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $table = new AdminClickableTable($layout->col1);

        $reader = new PublicSharePaginationReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        $reader->model->loadView();

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->content->subject->label);
        $header->addText($reader->model->view->label);
        $header->addEmpty();
        $header->addEmpty();


        foreach ($reader->getData() as $publicShareRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($publicShareRow->content->getContentType()->getSubject());
            $row->addText($publicShareRow->view->viewName);

            $input = new PublicShareUrlContainer($row);
            $input->shareId = $publicShareRow->id;

            $site = clone(PublicShareDeleteSite::$site);
            $site->addParameter(new PublicShareParameter($publicShareRow->id));
            $row->addIconSite($site);

        }


        return parent::getContent();
    }
}