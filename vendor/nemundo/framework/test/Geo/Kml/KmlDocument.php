<?php

require '../../config.php';


$kml = new \Nemundo\Geo\Kml\Document\KmlDocument();
$kml->filename = 'kml_example.kml';
$kml->kmlTitle = 'Kml Example';


$geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinateAltitude();
$geoCoordinate->longitude = 8.5;
$geoCoordinate->latitude = 42.33;
$geoCoordinate->altitude = 0;

$placemark = new \Nemundo\Geo\Kml\Object\KmlMarker($kml);
$placemark->label = 'Kml Placemaker';
$placemark->description = 'Description';
$placemark->coordinate = $geoCoordinate;

/*
$geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
$geoCoordinate->longitude = 10;
$geoCoordinate->latitude = 10;

$point = new \Nemundo\Geo\Kml\Element\KmlPlacemark($kml);
$point->name = 'Placemaker';
$point->description = 'Description';
$point->geoCoordinate = $geoCoordinate;*/

$kml->render();

