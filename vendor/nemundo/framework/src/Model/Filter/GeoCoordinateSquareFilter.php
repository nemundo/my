<?php

namespace Nemundo\Model\Filter;


use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Db\Filter\Filter;
use Nemundo\Geo\Coordinate\GeoCoordinateAddition;
use Nemundo\Model\Type\Geo\GeoCoordinateType;

class GeoCoordinateSquareFilter extends Filter
{

    /**
     * @var int
     */
    public $distanceInKilometres;

    /**
     * @var GeoCoordinate
     */
    public $coordinateCenter;


    /**
     * @var GeoCoordinateType
     */
    public $coordinateType;

    public function getSqlStatement()
    {

        $newCoordinate = (new GeoCoordinateAddition($this->coordinateCenter))->addDistance($this->distanceInKilometres);
        $this->andSmaller($this->coordinateType->latitude, $newCoordinate->latitude);
        $this->andSmaller($this->coordinateType->longitude, $newCoordinate->longitude);

        $newCoordinate = (new GeoCoordinateAddition($this->coordinateCenter))->addDistance($this->distanceInKilometres * (-1));
        $this->andGreater($this->coordinateType->latitude, $newCoordinate->latitude);
        $this->andGreater($this->coordinateType->longitude, $newCoordinate->longitude);

        return parent::getSqlStatement();

    }


}