<?php

namespace Nemundo\Com\Html\Structure;


use Nemundo\Html\Container\AbstractContentContainer;

class Section extends AbstractContentContainer
{

    public function getContent()
    {
        $this->tagName = 'section';
        return parent::getContent();
    }

}