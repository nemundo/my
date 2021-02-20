<?php

namespace Nemundo\Content\App\Map\Site;

use Nemundo\Content\App\Map\Data\RouteCoordinate\RouteCoordinateReader;
use Nemundo\Content\App\Map\Parameter\RouteParameter;
use Nemundo\Geo\Kml\Document\KmlDocument;
use Nemundo\Geo\Kml\Object\KmlLine;
use Nemundo\Package\FontAwesome\Site\AbstractKmlIconSite;

class RouteKmlSite extends AbstractKmlIconSite
{

    /**
     * @var RouteKmlSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Route Kml';
        $this->url = 'routekml';
        RouteKmlSite::$site = $this;
    }

    public function loadContent()
    {

        $kml = new KmlDocument();

        $line = new KmlLine($kml);
        $line->color = '501400FF';
        $line->width = 10;
       // $line->


        $routeId = (new RouteParameter())->getValue();

        $reader = new RouteCoordinateReader();
        $reader->filter->andEqual($reader->model->routeId, $routeId);
        $reader->addOrder($reader->model->id);
        foreach ($reader->getData() as $coordinateRow) {


            $coordinate = clone($coordinateRow->geoCoordinate);
            //$coordinate->altitude = $coordinate->altitude + 100;

            $line->addPoint($coordinate);

        }

        $kml->render();

    }
}