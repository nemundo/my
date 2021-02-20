<?php


require '../config.php';

/*
$textarea = new \Nemundo\Html\Form\Textarea\Textarea();
$textarea->value = '123123';
(new \Nemundo\Core\Debug\Debug())->write($textarea->getBodyContent());
*/


$html = new \Nemundo\Html\Document\HtmlDocument();

$textarea = new \Nemundo\Html\Form\Textarea\Textarea($html);
$textarea->cols=10;
$textarea->rows=10;

$textarea->value = 'line1'.PHP_EOL.'line2';

$html->render();
