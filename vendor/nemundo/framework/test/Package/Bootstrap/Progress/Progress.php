<?php

require '../config.php';


$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();


$progress = new \Nemundo\Package\Bootstrap\Progress\BootstrapProgress($html);
$progress->value = 20;

$html->render();

