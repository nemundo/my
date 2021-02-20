<?php

namespace Nemundo\Package\Bootstrap\ListGroup;


use Nemundo\Html\Container\AbstractHtmlContainer;

class BootstrapListGroup extends AbstractHtmlContainer
{

    public function getContent()
    {

        $this->tagName = 'div';
        $this->addCssClass('list-group');

        return parent::getContent();
    }

}