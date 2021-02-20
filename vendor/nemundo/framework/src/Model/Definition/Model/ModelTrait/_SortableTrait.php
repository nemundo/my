<?php

namespace Nemundo\Model\Definition\Model\ModelTrait;


use Nemundo\Orm\Type\Number\NumberOrmType;


trait SortableTrait
{

    /**
     * @var NumberOrmType
     */
    public $itemOrder;


    protected function loadSortable()
    {
        $this->itemOrder = new NumberOrmType($this);
        $this->itemOrder->fieldName = 'item_order';
        $this->itemOrder->variableName = 'itemOrder';
        $this->itemOrder->visible->form = false;
        $this->itemOrder->visible->table = false;
        $this->itemOrder->visible->view = false;

        $this->addDefaultOrderType($this->itemOrder);

    }

}