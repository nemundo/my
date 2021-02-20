<?php

require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();


$form = new \Nemundo\Html\Form\Form($html);
$form->formMethod = \Nemundo\Html\Form\FormMethod::POST;
$form->action = 'PostSubmit.php';


$input = new \Nemundo\Html\Form\Input\RangeInput($form);
$input->name = 'range';
$input->min = 0;
$input->max = 100;

new \Nemundo\Html\Form\Input\SubmitInput($form);


$html->render();

