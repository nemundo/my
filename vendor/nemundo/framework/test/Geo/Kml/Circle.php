<?php

require '../../config.php';


$kml = new \Nemundo\Geo\Kml\Document\KmlDocument();
//$kml->filename = 'linear_ring.kml';
//$kml->kmlTitle = 'Linear Ring';

$placemark = new \Nemundo\Geo\Kml\Container\Placemark($kml);
$placemark->label = 'Circle';

$circle = new \Nemundo\Geo\Kml\Element\Circle($placemark);
//$circle->extrude=true;

$circle->centerCoordinate->latitude = 46.82229;
$circle->centerCoordinate->longitude = 8.24721;
$circle->centerCoordinate->altitude = 1848;
$circle->radiusInMeter = 400;

$kml->render();
