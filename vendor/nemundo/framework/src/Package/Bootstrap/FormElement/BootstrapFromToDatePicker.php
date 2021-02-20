<?php

namespace Nemundo\Package\Bootstrap\FormElement;

use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class BootstrapFromToDatePicker extends AbstractContainer
{

    /**
     * @var BootstrapDatePicker
     */
    private $from;

    /**
     * @var BootstrapDatePicker
     */
    private $to;

    /**
     * @var bool
     */
    public $searchMode = false;

    /**
     * @var bool
     */
    public $validation = false;

    protected function loadContainer()
    {

        parent::loadContainer();

        $formRow = new BootstrapRow($this);

        $this->from = new BootstrapDatePicker($formRow);
        $this->from->label[LanguageCode::EN] = 'From';
        $this->from->label[LanguageCode::DE] = 'Von';

        $this->to = new BootstrapDatePicker($formRow);
        $this->to->label[LanguageCode::EN] = 'To';
        $this->to->label[LanguageCode::DE] = 'Bis';

    }


    public function getContent()
    {

        $this->from->searchMode = $this->searchMode;
        $this->from->validation = $this->validation;

        $this->to->searchMode = $this->searchMode;
        $this->to->validation = $this->validation;

        return parent::getContent();

    }


    public function hasValueFrom()
    {
        return $this->from->hasValue();
    }


    public function hasValueTo()
    {
        return $this->to->hasValue();
    }


    public function getDateFrom()
    {
        return $this->from->getDateValue();
    }


    public function getDateTo()
    {
        return $this->to->getDateValue();
    }


}