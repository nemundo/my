<?php

namespace Nemundo\Web\Template;


use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Html\Document\HtmlDocument;


class NotFound404Page extends HtmlDocument
{

    public function getContent()
    {

        //$this->statusCode = StatusCode::NOT_FOUND;

        $this->title = '404 - Page not found';

        $p = new Paragraph($this);
        $p->content = '404 - Page not found';

        return parent::getContent();
    }

}