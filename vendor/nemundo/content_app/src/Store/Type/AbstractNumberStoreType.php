<?php

namespace Nemundo\Content\App\Store\Type;


use Nemundo\Content\App\Store\Data\NumberStore\NumberStore;
use Nemundo\Content\App\Store\Data\NumberStore\NumberStoreCount;
use Nemundo\Content\App\Store\Data\NumberStore\NumberStoreDelete;
use Nemundo\Content\App\Store\Data\NumberStore\NumberStoreReader;

abstract class AbstractNumberStoreType extends AbstractStoreType
{

    /**
     * @var int
     */
    protected $defaultValue = 0;

    public function setValue($value)
    {

        $data = new NumberStore();
        $data->updateOnDuplicate = true;
        $data->id = $this->storeId;
        $data->number = $value;
        $data->save();

        return $this;

    }


    public function getValue()
    {

        $value = $this->defaultValue;

        $storeReader = new NumberStoreReader();
        $storeReader->filter->andEqual($storeReader->model->id, $this->storeId);
        foreach ($storeReader->getData() as $storeRow) {
            $value = $storeRow->number;
        }

        return $value;

    }


    public function hasValue()
    {

        $value = false;

        $count = new NumberStoreCount();
        $count->filter->andEqual($count->model->id, $this->storeId);
        if ($count->getCount() == 1) {
            $value = true;
        }

        return $value;

    }


    public function removeStore()
    {

        (new NumberStoreDelete())->deleteById($this->storeId);

        return $this;

    }

}