<?php

require '../../config.php';

$html = new \Nemundo\Html\Document\HtmlDocument();

$jquery = new \Nemundo\Package\Jquery\Container\JqueryHeader();
$html->addHeaderContainer($jquery);


$upload = new \Nemundo\Package\JqueryFileUpload\JqueryFileUpload($html);


$html->render();
