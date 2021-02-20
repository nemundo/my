<?php

namespace Nemundo\Model\Type\Number;


use Nemundo\Model\Data\Property\Number\PrefixAutoNumberDataProperty;
use Nemundo\Model\Item\Number\PrefixAutoNumberModelItem;
use Nemundo\Model\Type\Complex\AbstractComplexType;
use Nemundo\Model\Type\Text\TextType;

class PrefixAutoNumberType extends AbstractComplexType
{

    /**
     * @var string
     */
    public $prefix;

    /**
     * @var int
     */
    public $startNumber;

    /**
     * @var TextType
     */
    public $prefixAutoNumber;

    /**
     * @var NumberType
     */
    public $autoNumber;


    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->fieldMapping = false;

        $this->prefixAutoNumber = new TextType();
        $this->addType($this->prefixAutoNumber);

        $this->autoNumber = new NumberType();
        $this->addType($this->autoNumber);

        $this->visible->form = false;
        $this->dataPropertyClassName = PrefixAutoNumberDataProperty::class;
        $this->tableItemClassName = PrefixAutoNumberModelItem::class;
        $this->viewItemClassName = PrefixAutoNumberModelItem::class;

    }


    public function createObject()
    {

        $this->prefixAutoNumber->fieldName = $this->fieldName . '_auto_number';
        $this->prefixAutoNumber->aliasFieldName = $this->aliasFieldName . '_auto_number';
        $this->prefixAutoNumber->tableName = $this->tableName;

        $this->autoNumber->fieldName = $this->fieldName . '_prefix_auto_number';
        $this->autoNumber->aliasFieldName = $this->aliasFieldName . '_prefix_auto_number';
        $this->autoNumber->tableName = $this->tableName;

    }

}