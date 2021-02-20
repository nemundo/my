<?php

require '../config.php';


$html =new \Nemundo\Html\Document\HtmlDocument();  // new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();  // new \Nemundo\Html\Document\HtmlDocument();

$header = new \Nemundo\Dev\Js\JsPackageHeader($html);
$header->addJsPackage(new \Nemundo\Dev\Js\NemundoJsDevPackage());


$html->addJsUrl('web.js');

$select = new \Nemundo\Html\Form\Select\Select($html);
$select->id='select1';

$option = new \Nemundo\Html\Form\Select\Option($select);
$option->value = '1';
$option->label = 'One';

$option = new \Nemundo\Html\Form\Select\Option($select);
$option->value = '2';
$option->label = 'Two';


/*
$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber=1;
$loop->maxNumber=5;
foreach ($loop->getData() as $number) {

    $btn = new \Nemundo\Html\Button\Button($html);
    $btn->label = $number;
    $btn->id = 'btn_'.$number;
    $btn->addCssClass('button');

}*/




$html->render();


