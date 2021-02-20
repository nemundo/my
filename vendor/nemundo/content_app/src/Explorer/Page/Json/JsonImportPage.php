<?php

namespace Nemundo\Content\App\Explorer\Page\Json;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Com\Form\JsonImportForm;

class JsonImportPage extends ExplorerTemplate
{
    public function getContent()
    {

        $form=new JsonImportForm($this);



        return parent::getContent();
    }
}