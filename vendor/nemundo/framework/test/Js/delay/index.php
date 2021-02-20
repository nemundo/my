<?php

require '../../config.php';


$html =  new \Nemundo\Html\Document\HtmlDocument();

$header = new \Nemundo\Dev\Js\JsPackageHeader($html);
$header->addJsPackage(new \Nemundo\Dev\Js\NemundoJsDevPackage());

$html->addJsUrl('document.js');

$div= new \Nemundo\Html\Block\Div($html);
$div->id = 'app';



$html->render();


