<?php

require '../../config.php';

$document = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

$breadcrumb=new \Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb($document);
$breadcrumb->addActiveItem('test123');

$document->render();
