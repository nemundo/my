<?php


namespace Nemundo\Content\Index\Group\User;


use Nemundo\Content\Index\Group\Type\AbstractGroupContentType;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Data\Usergroup\UsergroupReader;

class UsergroupContentType extends AbstractGroupContentType
{

    public $groupId;

    protected function loadContentType()
    {

        $this->typeLabel = 'Usergroup (Content Group)';
        $this->typeId = 'b5c3df49-579f-4742-9ae5-489748638afd';

    }


    protected function getGroupLabel()
    {

        //$userRow = (new UserReader())->getRowById($this->groupId);
        $userRow = (new UsergroupReader())->getRowById($this->getDataId());
        return $userRow->usergroup;

    }


    public function getSubject()
    {
        return $this->getGroupLabel();
    }


}