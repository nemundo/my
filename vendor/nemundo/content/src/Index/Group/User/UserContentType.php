<?php


namespace Nemundo\Content\Index\Group\User;


use Nemundo\Content\Index\Group\Type\AbstractGroupContentType;
use Nemundo\User\Data\User\UserReader;

class UserContentType extends AbstractGroupContentType
{

    public $groupId;

    protected function loadContentType()
    {

        $this->typeLabel = 'User (Content Group)';
        $this->typeId = 'd93ebc1c-5d09-49fc-be3a-68ce1469d81d';

    }


    protected function getGroupLabel()
    {

        //$userRow = (new UserReader())->getRowById($this->groupId);
        $userRow = (new UserReader())->getRowById($this->getDataId());
        return $userRow->displayName;

    }




}