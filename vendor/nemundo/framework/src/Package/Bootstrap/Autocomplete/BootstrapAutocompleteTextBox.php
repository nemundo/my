<?php

namespace Nemundo\Package\Bootstrap\Autocomplete;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFormStyle;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\JqueryUi\Autocomplete\AutocompleteMultipleValueTextInput;
use Nemundo\Package\JqueryUi\Autocomplete\AutocompleteTrait;


class BootstrapAutocompleteTextBox extends BootstrapTextBox
{

    use LibraryTrait;
    use AutocompleteTrait;
    use BootstrapFormStyle;


    public function getContent()
    {

        $this->prepareHtml();
        $this->loadStyle();

        $input = new AutocompleteMultipleValueTextInput($this);
        $input->addCssClass('form-control');
        $input->sourceSite = $this->sourceSite;

        return parent::getContent();

    }


}