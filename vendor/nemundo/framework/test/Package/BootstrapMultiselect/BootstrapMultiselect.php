<?php

require '../../config.php';

$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

$jquery = new \Nemundo\Package\Jquery\Container\JqueryHeader();
$html->addHeaderContainer($jquery);

$form = new \Nemundo\Com\FormBuilder\SearchForm($html);

$multiSelect = new \Nemundo\Package\BootstrapMultiselect\BootstrapMultiselect($form);
$multiSelect->name = 'multiselect';

$option = new \Nemundo\Html\Form\Select\Option($multiSelect);
$option->value = 1;
$option->label = 'Value 1';

$option = new \Nemundo\Html\Form\Select\Option($multiSelect);
$option->value = 2;
$option->label = 'Value 2';
$option->selected = true;

$option = new \Nemundo\Html\Form\Select\Option($multiSelect);
$option->value = 3;
$option->label = 'Value 3';
$option->selected = true;

$submit = new \Nemundo\Package\Bootstrap\FormElement\BootstrapSubmitButton($form);

$html->render();

