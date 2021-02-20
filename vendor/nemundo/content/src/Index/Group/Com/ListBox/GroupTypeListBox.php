<?php


namespace Nemundo\Content\Index\Group\Com\ListBox;


use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Content\Index\Group\Data\GroupType\GroupTypeReader;
use Nemundo\Content\Index\Group\Parameter\GroupTypeParameter;

class GroupTypeListBox extends BootstrapListBox
{


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->label = 'Group Type';
        $this->name = (new GroupTypeParameter())->getParameterName();

        $reader = new GroupTypeReader();
        $reader->model->loadGroupType();
        $reader->addOrder($reader->model->groupType->contentType);
        foreach ($reader->getData() as $groupTypeRow) {
            $this->addItem($groupTypeRow->groupTypeId, $groupTypeRow->groupType->contentType);
        }

    }

}