<?php

namespace Nemundo\App\Application\Page;


use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Paragraph\Paragraph;

class AppPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $p = new Paragraph($this);
        $p->content = 'No App available';

        return parent::getContent();

    }

}