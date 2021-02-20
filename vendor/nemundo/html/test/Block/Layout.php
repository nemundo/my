<?php


require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Layout Example';


$header = new \Nemundo\Html\Layout\Header($html);

$nav = new \Nemundo\Html\Layout\Nav($html);

$footer = new \Nemundo\Html\Layout\Footer($html);


$html->render();