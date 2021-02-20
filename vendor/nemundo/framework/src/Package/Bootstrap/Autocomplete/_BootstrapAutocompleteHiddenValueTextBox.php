<?php

namespace Nemundo\Package\Bootstrap\Autocomplete;


use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Html\Form\Input\TextInput;

use Nemundo\Web\Site\AbstractSite;

class BootstrapAutocompleteHiddenValueTextBox extends BootstrapAutocompleteTextBox  // BootstrapTextBox
{

    //use LibraryTrait;


    /**
     * @var string
     */
    public $hiddenValueName;

    /**
     * @var string
     */
    public $hiddenValue;




    /**
     * @var int
     */
    //public $minLength = 1;

    /**
     * @var int
     */
    //public $delay = 0;

    /**
     * @var AbstractSite
     */
    //public $sourceSite;

    /**
     * @var HiddenInput
     */
    private $hidden;


    protected function loadContainer()
    {
        parent::loadContainer(); // TODO: Change the autogenerated stub

        $this->hidden = new TextInput($this);  // new HiddenInput($this);


    }

    public function getContent()
    {

        $this->codeList[] = 'select: function(event, ui) {';
        //$this->codeList[] = 'change: function(event, ui) {';
        $this->codeList[] = '$("#' . $this->hiddenValueName . '").val(ui.item.id);';
        $this->codeList[] = 'console.log("value: " + ui.item.id);';
        $this->codeList[] = '}';


        /*
        if (!$this->checkObject('sourceSite', $this->sourceSite, AbstractSite::class)) {
            return null;
        }

        $autocompleteId = $this->name;
        $this->addPackage(new JqueryUiPackage());

        $cssClass = 'autocomplete_' . $autocompleteId;
        $this->textInput->addCssClass($cssClass);
        $this->addJqueryScript('$(".' . $cssClass . '" ).autocomplete({');
        $this->addJqueryScript('source: "' . $this->sourceSite->getUrl() . '",');
        $this->addJqueryScript('minLength: ' . $this->minLength . ',');
        $this->addJqueryScript('delay: ' . $this->delay . ',');

        $this->addJqueryScript('select: function(event, ui) {');
        //$this->addJqueryScript('event.preventDefault();');
        //$this->addJqueryScript('console.log(ui.item.id);');
        $this->addJqueryScript('$("#' . $this->valueName . '").val(ui.item.id);');
        $this->addJqueryScript('}');

        /*
        select: function(event, ui) {
        event.preventDefault();
        $("#tag").val(ui.item.label);
        $('#clienteId').val(ui.item.value);
    }*/


        // $this->addJqueryScript('});');


        //$this->hidden = new HiddenInput($this);
        $this->hidden->name = $this->hiddenValueName;  // $this->name . '_id';  // $this->valueName;
        $this->hidden->id =$this->hiddenValueName;  // $this->name . '_id';  // $this->valueName;
        $this->hidden->value = $this->getHiddenValue();  // $this->hiddenValue;


        return parent::getContent();

    }


    public function getHiddenValue()
    {

        /*
        $parameter = new GetParameter();
        $parameter->parameterName =$this->hiddenValueName;   // $this->name . '_id';  // $this->valueName;

        $value = $parameter->getValue();  // $this->hidden->getValue();*/
        //$value = (new TakeoffParameter())->getValue();
        //return $value;

    }


}