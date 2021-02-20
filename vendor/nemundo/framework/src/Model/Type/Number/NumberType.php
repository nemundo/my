<?php

namespace Nemundo\Model\Type\Number;


use Nemundo\Core\Validation\ValidationType;
use Nemundo\Model\Form\Item\Text\TextModelFormItem;
use Nemundo\Model\Item\Number\NumberModelItem;
use Nemundo\Model\Type\AbstractModelType;


class NumberType extends AbstractModelType
{

    /**
     * @var string
     */
    //public $measurementUnit;

    /**
     * @var bool
     */
    //public $showThousandSeperator = true;

    /**
     * @var string
     */
    //public $thousandSeparator = '\'';


    /*
    protected function loadExternalType()
    {
       // $this->validationType = ValidationType::IS_NUMBER;

        /*
        $this->formTypeClassName = TextModelFormItem::class;
        $this->tableItemClassName = NumberModelItem::class;
        $this->viewItemClassName = NumberModelItem::class;*/

    //}

}