<?php

require '../../config.php';


class TestForm extends \Nemundo\Com\FormBuilder\AbstractFormBuilder
{

    /**
     * @var \Nemundo\Html\Form\Input\TextInput
     */
    private $input1;


    /**
     * @var \Nemundo\Html\Form\Select\Select
     */
    private $select1;

    public function getContent()
    {

        $this->input1 = new \Nemundo\Html\Form\Input\TextInput($this);
        $this->input1->name = 'input1';
        $this->input1->autofocus = true;


        /*
        $this->select1 = new Nemundo\Html\Form\Select\Select($this);
        $this->select1->name = 'select1';


        $option = new \Nemundo\Html\Form\Select\Option($this->select1);
        $option->label = 'choice1';
        $option->value = 0;

        $option = new \Nemundo\Html\Form\Select\Option($this->select1);
        $option->label = 'choice2';
        $option->value = 1;*/


        $btn = new \Nemundo\Html\Form\Button\SubmitButton($this);
        $btn->name='button_value';
        $btn->value='value01';
        $btn->label = 'Submit01';

        $btn = new \Nemundo\Html\Form\Button\SubmitButton($this);
        $btn->name='button_value';
        $btn->value='value02';
        $btn->label = 'Submit02';

        return parent::getContent();

    }


    protected function onSubmit()
    {

        (new \Nemundo\Core\Debug\Debug())->write($_POST);

        exit;

    }

}


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'FormBuilder Example';

$h1 = new \Nemundo\Html\Heading\H1($html);
$h1->content = 'FormBuilder';

$form = new TestForm($html);


$html->render();






