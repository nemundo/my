<?php

require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Form GET Example';

$form = new \Nemundo\Html\Form\Form($html);
$form->formMethod = \Nemundo\Html\Form\FormMethod::GET;

//$form->action = 'FormSubmit.php';

$input = new \Nemundo\Html\Form\Input\TextInput($form);
$input->name = 'input1';
$input->placeholder = 'Input 1';
$input->value = $input->getValue();

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


$submit = new \Nemundo\Html\Form\Button\SubmitButton($form);
$submit->label = 'Send';


$p = new \Nemundo\Html\Paragraph\Paragraph($html);
$p->content = 'Input Value: ' . $input->getValue();


$html->render();

