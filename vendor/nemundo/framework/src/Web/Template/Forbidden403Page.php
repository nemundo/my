<?php

namespace Nemundo\Web\Template;


use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Html\Document\HtmlDocument;


class Forbidden403Page extends HtmlDocument
{

    public function getContent()
    {

        //$this->statusCode = StatusCode::FORBIDDEN;

        $this->title = '403 - Kein Zugriff';

        $p = new Paragraph($this);
        $p->content = '403 - Kein Zugriff';

        return parent::getContent();
    }

}