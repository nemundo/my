<?php

namespace Nemundo\Model\Type\Web;


use Nemundo\Core\Validation\ValidationType;
use Nemundo\Model\Item\Web\UrlModelItem;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\Text\TextType;

class UrlType extends TextType
{

    /**
     * @var AbstractModelType[]
     */
    private $labelType = [];

    protected function loadExternalType()
    {

        parent::loadExternalType();
        $this->validationType = ValidationType::IS_URL;

        $this->viewItemClassName = UrlModelItem::class;
        $this->tableItemClassName = UrlModelItem::class;

    }


    public function addLabelType(AbstractModelType $type)
    {
        $this->labelType[] = $type;
        return $this;
    }


    /**
     * @return AbstractModelType[]
     */
    public function getLabelTypeList()
    {
        return $this->labelType;
    }

}