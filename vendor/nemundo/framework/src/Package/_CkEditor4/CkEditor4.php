<?php

namespace Nemundo\Package\CkEditor4;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Form\Textarea\Textarea;


class CkEditor4 extends AbstractHtmlContainer
{

    use CkEditor4Trait;

    public function getContent()
    {

        $textarea = new Textarea($this);
        $textarea->id = 'editor';

        $this->loadCkEditor($textarea->id);

        return parent::getContent();

    }

}