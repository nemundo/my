<?php

require '../../config.php';

$html = new \Nemundo\Html\Document\HtmlDocument();

$submit = new \Nemundo\Html\Form\Button\SubmitButton($html);
$submit->name = 'submit_name';
$submit->value = 'submit_value';


$html->render();
