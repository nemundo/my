<?php

require '../../config.php';


$html = new \Nemundo\Html\Document\HtmlDocument();

$header = new \Nemundo\Dev\Js\JsPackageHeader($html);
$header->addJsPackage(new \Nemundo\Dev\Js\NemundoJsDevPackage());

$html->addJsUrl('web.js');











$html->render();


