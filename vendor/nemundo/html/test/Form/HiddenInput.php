<?php

require '../../vendor/autoload.php';


$html = new \Nemundo\Html\Document\HtmlDocument();

$hidden = new \Nemundo\Html\Form\Input\HiddenInput($html);
$hidden->value = '123';

$html->render();

