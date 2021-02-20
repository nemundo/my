<?php

require '../../../config.php';


$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();


$tabs = new \Nemundo\Package\Bootstrap\Tabs\BootstrapSiteTabs($html);

$html->render();
