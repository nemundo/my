<?php

namespace Nemundo\Model\Type\DateTime;


use Nemundo\Core\Date\DateTimeFormat;
use Nemundo\Model\Form\Item\DateTime\DateTimeModelFormItem;
use Nemundo\Model\Item\DateTime\DateTimeModelItem;
use Nemundo\Model\Type\AbstractModelType;


class DateTimeType extends AbstractModelType
{

    //public $dateTimeFormat = DateTimeFormat::SHORT_DATE_TIME_FORMAT;


    /*
    protected function loadExternalType()
    {

        $this->formTypeClassName = DateTimeModelFormItem::class;
        /*$this->viewItemClassName = DateTimeModelItem::class;
        $this->tableItemClassName = DateTimeModelItem::class;*/

    //}

}