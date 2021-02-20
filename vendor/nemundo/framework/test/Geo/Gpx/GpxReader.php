<?php

require __DIR__.'/../../config.php';

$filename = __DIR__.'/route.gpx';

foreach ((new \Nemundo\Geo\Gpx\Reader\GpxReader($filename))->getData() as $geoCoordinateAltitude) {

    (new \Nemundo\Core\Debug\Debug())->write($geoCoordinateAltitude);

}
