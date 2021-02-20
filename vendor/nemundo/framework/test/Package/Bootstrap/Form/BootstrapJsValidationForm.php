<?php

require '../../config.php';


class TestForm extends \Nemundo\Package\Bootstrap\Form\BootstrapJsValidationForm
{

    /**
     * @var \Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox
     */
    private $firstName;

    /**
     * @var \Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox
     */
    private $email;

    /**
     * @var \Nemundo\Package\Bootstrap\FormElement\BootstrapDatePicker
     */
    private $datePicker;

    /**
     * @var \Nemundo\Package\Bootstrap\FormElement\BootstrapPasswordTextBox
     */
    private $password;

    /**
     * @var \Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox
     */
    private $checkbox;

    /**
     * @var \Nemundo\Package\Bootstrap\FormElement\BootstrapListBox
     */
    private $listBox;

    public function getContent()
    {




        $this->firstName = new \Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox($this);
        $this->firstName->label = 'Name';
        $this->firstName->autofocus = true;
        $this->firstName->validation = true;

        $this->email = new \Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox($this);
        $this->email->label = 'eMail';
        $this->email->validation = true;
        $this->email->validationType = \Nemundo\Core\Validation\ValidationType::IS_EMAIL;
        $this->email->value = 'test@test.com';

        $this->datePicker = new \Nemundo\Package\Bootstrap\FormElement\BootstrapDatePicker($this);
        $this->datePicker->label = 'Date';
        $this->datePicker->validation=true;

        $this->listBox = new \Nemundo\Package\Bootstrap\FormElement\BootstrapListBox($this);
        $this->listBox->label = 'ListBox';
        $this->listBox->validation=true;
        $this->listBox->addItem(1, 'Item1');
        $this->listBox->addItem(2, 'Item2');
        $this->listBox->addItem(3, 'Item3');


        return parent::getContent();

    }


    protected function onSubmit()
    {

        (new \Nemundo\Core\Debug\Debug())->write($_POST);
        exit;

    }


}


$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

//$jquery = new \Nemundo\Package\Jquery\Container\JqueryHeader();
//$html->addHeaderContainer($jquery);

new \TestForm($html);

$html->render();


