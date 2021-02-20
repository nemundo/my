<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Package\CkEditor4\CkEditor4Trait;

class BootstrapCkEditor4Editor extends BootstrapLargeTextBox
{

    use CkEditor4Trait;

    public function getContent()
    {

        $this->loadCkEditor($this->name);
        return parent::getContent();

    }

}