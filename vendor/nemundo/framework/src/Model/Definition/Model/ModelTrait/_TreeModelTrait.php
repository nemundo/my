<?php
namespace Nemundo\Model\Definition\Model\ModelTrait;


use Nemundo\Model\Type\Id\UniqueIdType;
use Nemundo\Model\Type\Number\NumberType;

trait TreeModelTrait {


    /**
     * @var UniqueIdType
     */
    public $parentId;

    /**
     * @var NumberType
     */
    public $itemOrder;


    public function loadTreeModel()
    {

        $this->parentId = new UniqueIdType($this);
        $this->parentId->fieldName = 'parent_id';
        $this->parentId->visible->form = false;

        $this->itemOrder = new NumberType($this);
        $this->itemOrder->fieldName = 'item_order';
        $this->itemOrder->visible->form = false;

    }


}

