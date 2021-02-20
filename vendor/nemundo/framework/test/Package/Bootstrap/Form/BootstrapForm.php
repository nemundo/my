<?php

require '../../config.php';



class TestForm extends \Nemundo\Package\Bootstrap\Form\BootstrapForm
{

    /**
     * @var \Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox
     */
    private $vorname;

    /**
     * @var \Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox
     */
    private $email;

    /**
     * @var \Nemundo\Package\Bootstrap\FormElement\BootstrapPasswordTextBox
     */
    private $password;

    /**
     * @var \Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox
     */
    private $checkbox;

    private $listBox;

    public function getContent()
    {


        $this->vorname = new \Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox($this);
        $this->vorname->label = 'Name';
        $this->vorname->autofocus = true;
        $this->vorname->validation = true;
        //$this->name->validationType = \Nemundo\Core\Validation\ValidationType::IS_EMAIL;


        /*
        $this->email = new \Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox($this);
        $this->email->label = 'eMail';
        $this->email->validation = true;
        $this->email->validationType = \Nemundo\Core\Validation\ValidationType::IS_EMAIL;
        $this->email->value = 'test@test.com';

        /* $this->password = new \Nemundo\Package\Bootstrap\FormElement\BootstrapPasswordTextBox($this);
         $this->password->label = 'Password';*/


        $this->listBox = new \Nemundo\Package\Bootstrap\FormElement\BootstrapListBox($this);
        $this->listBox->label = 'ListBox';
        $this->listBox->addItem(1, 'One');
        $this->listBox->addItem(2, 'Two');
        $this->listBox->addItem(3, 'Three');

/*
        $this->checkbox = new \Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox($this);
        $this->checkbox->label = 'CheckBox';
        $this->checkbox->value = true;

        $input = new \Nemundo\Package\Bootstrap\FormElement\BootstrapPasswordTextBox($this);
        $input->label = 'Password';*/

        return parent::getContent();

    }


    protected function onSubmit()
    {

        //(new \Nemundo\Core\Debug\Debug())->write($_POST);

        /*if ($_POST[$this->checkbox->name]) {
            (new \Nemundo\Core\Debug\Debug())->write('CheckBox Checked');
        } else {
            (new \Nemundo\Core\Debug\Debug())->write('CheckBox Unchecked');
        }*/


        (new \Nemundo\Core\Debug\Debug())->write('Name: ' . $this->vorname->getValue());


        /*
        (new \Nemundo\Core\Debug\Debug())->write('ListBox: ' . $this->listBox->getValue());


        (new \Nemundo\Core\Debug\Debug())->write('eMail: ' . $this->email->getValue());

        if ($this->checkbox->getValue()) {
            (new \Nemundo\Core\Debug\Debug())->write('CheckBox Checked');
        } else {
            (new \Nemundo\Core\Debug\Debug())->write('CheckBox Unchecked');
        }*/

        exit;

    }


}


$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

new \TestForm($html);

$html->render();

