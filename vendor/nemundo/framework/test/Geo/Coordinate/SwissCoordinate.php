<?php

require __DIR__ . '/../../config.php';

$swissCoordinate = new \Nemundo\Geo\Coordinate\Swiss\SwissCoordinateConverter();
$coordinate = $swissCoordinate->getLatLon(729880, 115820);

$html = new \Nemundo\Html\Document\HtmlDocument();

$link = new \Nemundo\Geo\Map\GoogleMaps\GoogleMapsHyperlink($html);
$link->geoCoordinate = $coordinate;

$html->render();
