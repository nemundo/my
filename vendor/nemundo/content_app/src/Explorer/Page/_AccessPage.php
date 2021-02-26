<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Document\Com\Form\DocumentGroupForm;
use Nemundo\Content\App\Document\Data\DocumentGroupIndex\DocumentGroupIndexReader;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Parameter\ContentParameter;

class AccessPage extends ExplorerTemplate
{
    public function getContent()
    {


        /*$subtitle = new AdminSubtitle($layout->col2);
        $subtitle->content = 'Group';

        $table = new AdminTable($layout->col2);

        $header = new TableRow($table);
        $header->addText('Group');

        foreach ($contentType->getUserList() as $userRow) {
            $row = new TableRow($table);
            $row->addText($userRow->login);
        }*/


        $contentParameter=new ContentParameter();
        $contentParameter->contentTypeCheck=false;
        $contentType = $contentParameter->getContent();



        $subtitle = new AdminSubtitle($this);
        $subtitle->content = 'Document Group';

        $table = new AdminTable($this);

        $header = new TableHeader($table);
        $header->addText('Group');

        $reader = new DocumentGroupIndexReader();
        $reader->model->loadGroup();
        $reader->filter->andEqual($reader->model->contentId, $contentType->getContentId());
        foreach ($reader->getData() as $indexRow) {

            $row = new TableRow($table);
            $row->addText($indexRow->group->group);

        }

        $form = new DocumentGroupForm($this);
        $form->contentId = $contentType->getContentId();


        return parent::getContent();
    }
}