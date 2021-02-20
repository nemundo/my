<?php

namespace Nemundo\Model\Type\Text;


use Nemundo\Model\Form\Item\Text\TextModelFormItem;

use Nemundo\Model\Type\AbstractModelType;

// TextModelType
class TextType extends AbstractModelType
{

    /**
     * @var int
     */
    public $length = 255;


    /*
    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->formTypeClassName = TextModelFormItem::class;
        $this->viewItemClassName = TextModelItem::class;
        $this->tableItemClassName = TextModelItem::class;

    }*/

}