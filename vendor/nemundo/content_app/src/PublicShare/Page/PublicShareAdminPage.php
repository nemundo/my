<?php

namespace Nemundo\Content\App\PublicShare\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicSharePaginationReader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class PublicShareAdminPage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $table = new AdminClickableTable($this);

        $reader = new PublicSharePaginationReader();
$reader->model->loadContent();
$reader->model->content->loadContentType();


        foreach ($reader->getData() as $publicShareRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($publicShareRow->content->getContentType()->getSubject());
            //$row->addText($publicShareRow->)


        }



        return parent::getContent();
    }
}