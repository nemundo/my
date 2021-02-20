<?php

namespace Nemundo\Geo\Coordinate;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Type\Geo\GeoCoordinate;

class GeoCoordinateSquare extends AbstractBaseClass
{


    public function __construct(GeoCoordinate $centerCoordinate)
    {

        $distance = 1;

        $latitudeNew = $centerCoordinate->latitude + ($distance / EarthRadius::EARTH_RADIUS) * (180 / pi());
        $longitudeNew = $centerCoordinate->longitude + ($distance / EarthRadius::EARTH_RADIUS) * (180 / pi());


        //new_longitude = longitude + (dx / r_earth) * (180 / pi) / cos(latitude * pi / 180);

    }

}