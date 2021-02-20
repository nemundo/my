<?php

require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();

$button = new \Nemundo\Html\Button\Button($html);
$button->label = 'Click me';

$html->render();

