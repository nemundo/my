<?php

require '../../config.php';


$geoCoordinateFrom = new \Nemundo\Core\Type\Geo\GeoCoordinate();
$geoCoordinateFrom->latitude = 46.913252;
$geoCoordinateFrom->longitude = 8.398495;

$geoCoordinateTo = new \Nemundo\Core\Type\Geo\GeoCoordinate();
$geoCoordinateTo->latitude = 46.832225;
$geoCoordinateTo->longitude = 8.286938;

$geoDistance = new \Nemundo\Geo\Coordinate\GeoCoordinateDistance();
$geoDistance->geoCoordinateFrom = $geoCoordinateFrom;
$geoDistance->geoCoordinateTo = $geoCoordinateTo;

$distance = $geoDistance->getDistance();

(new \Nemundo\Core\Debug\Debug())->write($distance);
