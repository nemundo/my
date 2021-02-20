<?php

namespace Nemundo\Model\Type\Geo;

use Nemundo\Model\Form\Item\Geo\GeoCoordinateModelFormItem;
use Nemundo\Model\Item\Geo\GeoCoordinateModelItem;
use Nemundo\Model\Type\Complex\AbstractComplexType;
use Nemundo\Model\Type\Number\DecimalNumberType;


class GeoCoordinateType extends AbstractComplexType
{

    /**
     * @var DecimalNumberType
     */
    public $latitude;

    /**
     * @var DecimalNumberType
     */
    public $longitude;

    protected function loadExternalType()
    {

        $this->fieldMapping = false;

        $this->latitude = new DecimalNumberType();
        $this->addType($this->latitude);

        $this->longitude = new DecimalNumberType();
        $this->addType($this->longitude);

        /*
        $this->formTypeClassName = GeoCoordinateModelFormItem::class;
        $this->viewItemClassName = GeoCoordinateModelItem::class;
        $this->tableItemClassName = GeoCoordinateModelItem::class;*/

    }


    public function createObject()
    {

        $this->latitude->fieldName = $this->fieldName . '_lat';
        $this->latitude->aliasFieldName = $this->aliasFieldName . '_lat';
        $this->latitude->tableName = $this->tableName;
        $this->latitude->allowNullValue = $this->allowNullValue;
        //$this->addType($this->latitude);

        $this->longitude->fieldName = $this->fieldName . '_lon';
        $this->longitude->aliasFieldName = $this->aliasFieldName . '_lon';
        $this->longitude->tableName = $this->tableName;
        $this->longitude->allowNullValue = $this->allowNullValue;
        //$this->addType($this->longitude);

    }

}