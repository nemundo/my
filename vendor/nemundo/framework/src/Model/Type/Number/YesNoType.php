<?php

namespace Nemundo\Model\Type\Number;


use Nemundo\Model\Form\Item\Number\YesNoModelFormItem;
use Nemundo\Model\Item\Number\YesNoModelItem;
use Nemundo\Model\Type\AbstractModelType;

// YesNoModelType
class YesNoType extends AbstractModelType
{

    /**
     * @var bool
     */
    public $defaultValue; // = false;


    /*
    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->formTypeClassName = YesNoModelFormItem::class;
        $this->tableItemClassName = YesNoModelItem::class;
        $this->viewItemClassName = YesNoModelItem::class;

    }*/

}
