<?php

namespace Nemundo\Model\Type\Number;


use Nemundo\Model\Data\Property\Number\ItemOrderDataProperty;

class ItemOrderType extends NumberType
{

    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->visible->form = false;
        $this->fieldName = 'item_order';
        $this->dataPropertyClassName = ItemOrderDataProperty::class;
        $this->updatePropertyClassName = null;

    }

}