<?php

namespace Nemundo\Package\Bootstrap\FormElement;

use Nemundo\Com\FormBuilder\Item\AbstractDatePicker;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;

class BootstrapDatePicker extends AbstractDatePicker
{


    public function getContent()
    {

        $this->prepareHtml();

        $this->tagName = 'div';
        $this->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);
        $this->addCssClass('col');

        $this->textInput->addCssClass('form-control');

        $label = new Label();
        $label->id = 'label_' . $this->name;
        $label->addCssClass('form-label');
        $label->content = $this->getLabelText();

        if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('form-control-label');
            $bold->content = $this->errorMessage;

            $label->content .= ' ' . $bold->getContent();
            $this->addCssClass('has-danger');
            $this->textInput->addCssClass('form-control-danger');

        }

        $this->addContainer($label);
        $this->addContainer($this->textInput);

        return parent::getContent();

    }


    /*
    public function getDateValue()
    {

        $date = null;
        if ($this->hasValue()) {
            $date = new Date();
            $date->fromGermanFormat($this->getValue());
        }

        return $date;

    }*/

}