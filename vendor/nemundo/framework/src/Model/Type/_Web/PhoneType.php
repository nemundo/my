<?php

namespace Nemundo\Model\Type\Web;


use Nemundo\Model\Item\Web\PhoneModelItem;
use Nemundo\Model\Type\Text\TextType;

class PhoneType extends TextType
{

    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->tableItemClassName = PhoneModelItem::class;
        $this->viewItemClassName = PhoneModelItem::class;

    }

}