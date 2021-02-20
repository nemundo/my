<?php


namespace Nemundo\Content\Admin\Page;


use Nemundo\Content\Admin\Template\ContentTemplate;
use Nemundo\Content\Com\Form\JsonImportForm;

class ImportPage extends ContentTemplate
{

    public function getContent()
    {


        new JsonImportForm($this);


        return parent::getContent();

    }

}