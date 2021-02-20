<?php

require '../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title  = 'Jquery Example';

$html->addJsUrl('http://....');
$html->addJsUrl('http://....');


//$jquey = new \Nemundo\Com\Jquery\JqueryScript($html);
//$jquey->addScript('alert("hello world");');


$html->render();


