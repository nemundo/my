<?php

namespace Nemundo\Model\Type\Number;


use Nemundo\Model\Data\Property\Number\AutoNumberDataProperty;

class AutoNumberType extends NumberType
{

    /**
     * @var int
     */
    public $startNumber = 1;


    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->visible->form = false;
        $this->fieldName = 'auto_number';
        $this->showThousandSeperator = false;
        $this->dataPropertyClassName = AutoNumberDataProperty::class;


    }

}