<?php

namespace Nemundo\Admin\Com\Form;


use Nemundo\Admin\Com\Button\AdminSubmitButton;
use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;


abstract class AbstractAdminForm extends AbstractFormBuilder
{

    /**
     * @var SubmitButton
     */
    public $submitButton;

    /**
     * @var BootstrapRow
     */
    protected $buttonFormRow;

    protected function loadContainer()
    {
        parent::loadContainer();

        //$this->buttonFormRow = new BootstrapRow();

        $this->submitButton = new SubmitButton();  // new AdminSubmitButton();  // $this->buttonFormRow);
        $this->submitButton->addCssClass('btn btn-primary btn-sm');
        $this->submitButton->label=[];
        $this->submitButton->label[LanguageCode::EN] = 'Save';
        $this->submitButton->label[LanguageCode::DE] = 'Speichern';

    }


    public function getContent()
    {

        //$this->addContainer($this->buttonFormRow);
        $this->addContainer($this->submitButton);
        return parent::getContent();

    }

}