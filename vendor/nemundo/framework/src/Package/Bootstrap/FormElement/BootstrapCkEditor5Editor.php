<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Package\CkEditor5\CkEditor5Trait;

class BootstrapCkEditor5Editor extends BootstrapLargeTextBox
{

    use CkEditor5Trait;

    public function getContent()
    {

        $this->loadCkEditor($this->name);
        return parent::getContent();

    }

}