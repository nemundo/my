<?php


require '../../config.php';


$kml = new \Nemundo\Geo\Kml\Document\KmlDocument();
$kml->filename = 'linear_ring.kml';
$kml->kmlTitle = 'Linear Ring';


$placemark = new \Nemundo\Geo\Kml\Container\Placemark($kml);
$placemark->label = 'Linear Ring';
//$placemark->description = 'Description';
//$placemark->coordinate = $geoCoordinate;


$linearRing = new \Nemundo\Geo\Kml\Element\LinearRing($placemark);
$linearRing->extrude=true;

$geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinateAltitude();
$geoCoordinate->latitude = 46.83809;
$geoCoordinate->longitude=8.41263;
$geoCoordinate->altitude=1800;
$linearRing->addPoint($geoCoordinate);

$geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinateAltitude();
$geoCoordinate->latitude = 46.93043;
$geoCoordinate->longitude=8.34207;
$geoCoordinate->altitude=1848;
$linearRing->addPoint($geoCoordinate);

$geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinateAltitude();
$geoCoordinate->latitude = 46.82229 ;
$geoCoordinate->longitude=8.24721;
$geoCoordinate->altitude=2105;
$linearRing->addPoint($geoCoordinate);

$kml->render();
