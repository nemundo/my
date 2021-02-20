<?php

namespace Nemundo\Model\Type\Web;


use Nemundo\Core\Validation\ValidationType;
use Nemundo\Model\Form\Item\Text\TextModelFormItem;
use Nemundo\Model\Item\Web\EmailModelItem;
use Nemundo\Model\Type\Text\TextType;


class EmailType extends TextType
{

    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->validationType = ValidationType::IS_EMAIL;

        $this->formTypeClassName = TextModelFormItem::class;
        $this->tableItemClassName = EmailModelItem::class;
        $this->viewItemClassName = EmailModelItem::class;

    }

}