<?php

require '../config.php';

$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

$widget = new \Nemundo\Admin\Com\Widget\AdminWidget($html);
$widget->widgetTitle = 'Admin Widget';


$html->render();

