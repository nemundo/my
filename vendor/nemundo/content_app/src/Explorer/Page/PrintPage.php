<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Header\Title;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;

class PrintPage extends BootstrapDocument
{
    public function getContent()
    {

        $parameter = new ContentParameter();
        //$contentId = $parameter->getValue();
        $contentType = (new ContentParameter())->getContentType(false);

        $title = new Title($this);
        $title->content = $contentType->getSubject();

        $contentType->getDefaultView($this);

        return parent::getContent();
    }
}