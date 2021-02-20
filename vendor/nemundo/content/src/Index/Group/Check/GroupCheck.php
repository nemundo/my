<?php


namespace Nemundo\Content\Index\Group\Check;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Content\Index\Group\Data\GroupUser\GroupUserCount;
use Nemundo\Content\Index\Group\Type\AbstractGroupContentType;
use Nemundo\User\Type\UserSessionType;


class GroupCheck extends AbstractBase
{

    public function isMemberOfGroup(AbstractGroupContentType $groupContentType)
    {

        $value = false;

        $count = new GroupUserCount();
        $count->filter->andEqual($count->model->userId, (new UserSessionType())->userId);
        $count->filter->andEqual($count->model->groupId, $groupContentType->getGroupId());
        if ($count->getCount() > 0) {
            $value = true;
        }

        return $value;

    }



    public function isMemberOfGroupId($groupId)
    {

        $value = false;

        $count = new GroupUserCount();
        $count->filter->andEqual($count->model->userId, (new UserSessionType())->userId);
        $count->filter->andEqual($count->model->groupId,$groupId);
        if ($count->getCount() > 0) {
            $value = true;
        }

        return $value;

    }


}