<?php


namespace Nemundo\Content\Index\Group\Setup;


use Nemundo\Content\Setup\AbstractContentTypeSetup;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Index\Group\Data\Group\GroupDelete;
use Nemundo\Content\Index\Group\Data\GroupType\GroupType;
use Nemundo\Content\Index\Group\Type\AbstractGroupContentType;


// GroupTypeSetup
class GroupSetup extends AbstractContentTypeSetup
{

    //public function addGroupType(AbstractGroupContentType $groupType)
    public function addGroupType(AbstractContentType $groupType)
    {

        $this->addContentType($groupType);

        $data = new GroupType();
        $data->updateOnDuplicate = true;
        $data->groupTypeId = $groupType->typeId;
        $data->setupStatus = true;
        $data->save();

        return $this;

    }


    public function removeGroupContent(AbstractGroupContentType $groupType)
    {

        $delete = new GroupDelete();
        $delete->filter->andEqual($delete->model->groupTypeId, $groupType->typeId);
        $delete->delete();

        return $this;

    }


    public function addGroup(AbstractGroupContentType $group)
    {

        $group->saveType();

        return $this;

    }


}