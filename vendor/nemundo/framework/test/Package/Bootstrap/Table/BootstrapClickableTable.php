<?php


require '../../config.php';


$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();
$html->title = 'Jquery Example';

//$html->addHeaderContainer(new \Nemundo\Package\Jquery\Container\JqueryHeader());


new \Nemundo\Html\Header\LibraryHeader($html);


$table = new \Nemundo\Package\Bootstrap\Table\BootstrapClickableTable($html);

$row = new \Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow($table);
$row->addText('Text1');
$row->addClickableUrl('http://example.com');




$html->render();