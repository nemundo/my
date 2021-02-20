<?php

require '../../config.php';

$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

// jqueryready

$map = new \Nemundo\Geo\Map\GeoAdmin\GeoAdminMap($html);
$map->addLayer(\Nemundo\Geo\Map\GeoAdmin\GeoAdminMapLayer::PIXELKARTE);

$html->render();

