<?php

namespace Nemundo\Content\App\Map\Content\SwissMap;

use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;

class SwissMapContentType extends AbstractTreeContentType
{

    // layer
    // zoom
    // center

    protected function loadContentType()
    {
        $this->typeLabel = 'Swiss Map';
        $this->typeId = 'c9fe8599-3221-4b01-a22f-dba6ee455caf';
        $this->formClassList[] = SwissMapContentForm::class;
        $this->viewClassList[]  = SwissMapContentView::class;

        $this->dataId=0;

    }

    protected function onCreate()
    {
    }

    protected function onUpdate()
    {
    }

    protected function onDataRow()
    {
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }
}