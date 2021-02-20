<?php

namespace Nemundo\Package\Bootstrap\Form;


use Nemundo\Model\Form\ModelForm;

class BootstrapModelForm extends ModelForm
{


    public function getContent()
    {

        $this->submitButton->label = 'Speichern';
        $this->submitButton->addCssClass('btn btn-primary');

        return parent::getContent();

    }

}