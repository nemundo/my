<?php

namespace Nemundo\Model\Type\Text;


use Nemundo\Model\Form\Item\Text\HtmlModelFormItem;

class HtmlType extends LargeTextType
{

    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->formTypeClassName = HtmlModelFormItem::class;


    }

}