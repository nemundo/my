<?php

require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Form Example';

$form = new \Nemundo\Html\Form\Form($html);
$form->action = 'FormSubmit.php';
$form->id = 'bla';
$form->formMethod = \Nemundo\Html\Form\FormMethod::POST;


$input = new \Nemundo\Html\Form\Input\TextInput($form);
$input->name = 'input1';
$input->placeholder = 'Input 1';
$input->value = 'hello world';

$select = new \Nemundo\Html\Form\Select\Select($form);

$option = new \Nemundo\Html\Form\Select\Option($select);
$option->value = 1;
$option->label = 'Choice 1';

$option = new \Nemundo\Html\Form\Select\Option($select);
$option->value = 2;
$option->label = 'Choice 2';
$option->selected = true;

$textarea = new \Nemundo\Html\Form\Textarea\Textarea($form);
$textarea->name = 'textarea';
$textarea->value = 'default value';

$fileInput = new \Nemundo\Html\Form\Input\FileInput($form);
$fileInput->name = 'file';
//$fileInput->multiple = true;

$checkbox = new \Nemundo\Html\Form\Input\CheckBoxInput($form);
$checkbox->name = 'checkbox';
$checkbox->value = '1';
$checkbox->checked = true;

$btn = new \Nemundo\Html\Form\Button\SubmitButton($form);
$btn->label = 'ok';

/*
$submit = new \Nemundo\Html\Form\Input\SubmitInput($form);
$submit->name = 'btn';
$submit->value = 'Request';
*/


$html->render();

