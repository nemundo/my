<?php

require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();


$form = new \Nemundo\Html\Form\Form($html);
$form->formMethod = \Nemundo\Html\Form\FormMethod::POST;
$form->action = 'SelectSubmit.php';

$select = new \Nemundo\Html\Form\Select\Select($form);
$select->name = 'select';
$select->multiple=true;

$option = new \Nemundo\Html\Form\Select\Option($select);
$option->value = 1;
$option->label = 'Option 1';

$option = new \Nemundo\Html\Form\Select\Option($select);
$option->value = 2;
$option->label = 'Option 2';

$option = new \Nemundo\Html\Form\Select\Option($select);
$option->value = 3;
$option->label = 'Option 3';


$submit = new \Nemundo\Html\Form\Input\SubmitInput($form);
$submit->value = 'Submit';


/*
$optgroup = new \Nemundo\Html\Form\Select\Optgroup($select);
$optgroup->label = 'Optgroup1';

$option = new \Nemundo\Html\Form\Select\Option($select);
$option->value = 1;
$option->label = 'Option 1';

$option = new \Nemundo\Html\Form\Select\Option($select);
$option->value = 1;
$option->label = 'Option 2';
$option->disabled = true;

$optgroup = new \Nemundo\Html\Form\Select\Optgroup($select);
$optgroup->label = 'Optgroup2';
$optgroup->disabled = true;

$option = new \Nemundo\Html\Form\Select\Option($select);
$option->value = 3;
$option->label = 'Option 3';

$option = new \Nemundo\Html\Form\Select\Option($select);
$option->value = 4;
$option->label = 'Option 4';*/




$html->render();

