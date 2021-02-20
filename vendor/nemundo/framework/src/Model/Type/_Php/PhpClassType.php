<?php

namespace Nemundo\Model\Type\Php;


use Nemundo\Model\Form\Item\Text\TextModelFormItem;
use Nemundo\Model\Item\Text\TextModelItem;
use Nemundo\Model\Type\AbstractModelType;

// PhpClassModelType
class PhpClassType extends AbstractModelType
{

    /**
     * @var string
     */
    public $phpClassName;


    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->formTypeClassName = TextModelFormItem::class;
        $this->viewItemClassName = TextModelItem::class;
        $this->tableItemClassName = TextModelItem::class;

    }

}