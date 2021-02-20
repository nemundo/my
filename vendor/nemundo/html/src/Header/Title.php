<?php

namespace Nemundo\Html\Header;


use Nemundo\Html\Container\AbstractContentContainer;


class Title extends AbstractContentHeaderContainer  // AbstractContentContainer
{

    public function getContent()
    {

        $this->tagName = 'title';
        $this->returnOneLine = true;

        return parent::getContent();

    }

}