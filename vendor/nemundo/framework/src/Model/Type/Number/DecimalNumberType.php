<?php

namespace Nemundo\Model\Type\Number;


use Nemundo\Core\Validation\ValidationType;
use Nemundo\Model\Form\Item\Number\DecimalNumberModelFormItem;
use Nemundo\Model\Item\Number\DecimalNumberModelItem;
use Nemundo\Model\Type\AbstractModelType;

class DecimalNumberType extends AbstractModelType
{

    /**
     * @var string
     */
    //public $measurementUnit;

   /* protected function loadExternalType()
    {

        // todo: komma durch punkt ersetzen in inbox
        // todo: validationType
        $this->validationType = ValidationType::IS_NUMBER;

        /*
        $this->formTypeClassName = DecimalNumberModelFormItem::class;  // TextModelFormItem::class;
        $this->tableItemClassName = DecimalNumberModelItem::class;
        $this->viewItemClassName = DecimalNumberModelItem::class;*/

    //}

}