<?php

namespace Nemundo\Geo\Coordinate\Swiss;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Geo\GeoCoordinate;

/**
 * https://github.com/ValentinMinder/Swisstopo-WGS84-LV03
 */
class SwissCoordinateConverter extends AbstractBase
{

    public function getLatLon($swissY, $swissX)
    {

        $coordinate = new GeoCoordinate();

        $y_aux = ($swissY - 600000) / 1000000;
        $x_aux = ($swissX - 200000) / 1000000;

        $lat = 16.9023892
            + 3.238272 * $x_aux
            - 0.270978 * pow($y_aux, 2)
            - 0.002528 * pow($x_aux, 2)
            - 0.0447 * pow($y_aux, 2) * $x_aux
            - 0.0140 * pow($x_aux, 3);

        $coordinate->latitude = $lat * 100 / 36;

        $long = 2.6779094
            + 4.728982 * $y_aux
            + 0.791484 * $y_aux * $x_aux
            + 0.1306 * $y_aux * pow($x_aux, 2)
            - 0.0436 * pow($y_aux, 3);

        $coordinate->longitude = $long * 100 / 36;

        return $coordinate;

    }

}