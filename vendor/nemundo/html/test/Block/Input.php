<?php

require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Form Example';

$form = new \Nemundo\Html\Form\Form($html);



$input = new \Nemundo\Html\Form\Input\TextInput($form);
$input->name = 'input1';
$input->inputType = \Nemundo\Html\Form\Input\InputType::PASSWORD;
//$input->placeholder = 'Input 1';


$submit = new \Nemundo\Html\Form\Button\SubmitButton($form);
$submit->label = 'Send';


$html->render();

