<?php

namespace Nemundo\Package\CkEditor4;


use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Form\Textarea\Textarea;

// Ck4InlineEditor
class CkInlineEditor4 extends AbstractHtmlContainer
{

    use CkEditor4Trait;

    public function getContent()
    {

        $textarea = new Div($this);  // new Textarea($this);
        $textarea->id = 'inline-editor';
        $textarea->editable=true;


        $this->loadCkEditor($textarea->id);

        return parent::getContent();

    }

}