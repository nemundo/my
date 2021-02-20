<?php

namespace Nemundo\Geo\Coordinate;


use Nemundo\Core\Type\Geo\GeoCoordinate;

class GeoCoordinateAddition
{

    /**
     * @var GeoCoordinate
     */
    private $centerCoordinate;

    public function __construct(GeoCoordinate $centerCoordinate)
    {

        $this->centerCoordinate = $centerCoordinate;

    }


    public function addDistance($km)
    {


        $geoCoordinate = new GeoCoordinate();
        $geoCoordinate->latitude = $this->centerCoordinate->latitude + ($km / EarthRadius::EARTH_RADIUS) * (180 / pi());
        $geoCoordinate->longitude = $this->centerCoordinate->longitude + ($km / EarthRadius::EARTH_RADIUS) * (180 / pi());


        return $geoCoordinate;

    }


}