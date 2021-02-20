<?php


namespace Nemundo\Content\Index\Group\Session;


use Nemundo\Content\App\UserProfile\Content\UserProfile\UserProfileContentType;
use Nemundo\Content\Index\Group\Data\Group\GroupId;
use Nemundo\Content\Index\Group\Data\GroupUser\GroupUserId;
use Nemundo\Content\Index\Group\Data\GroupUser\GroupUserReader;
use Nemundo\Content\Index\Group\User\UserContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Type\UserSessionType;

class UserGroupSession extends AbstractBase
{

    public function getGroupId()
    {

        $groupId=null;

        //(new UserSessionType())->userId;

        $reader = new GroupUserReader();
        $reader->model->loadGroup();
        $reader->filter->andEqual($reader->model->userId,(new UserSessionType())->userId);
        //$id->filter->andEqual($id->model->userId,(new UserSessionType())->userId);
        $reader->filter->andEqual($reader->model->group->groupTypeId, (new UserProfileContentType())->typeId);
        //$id->filter->andEqual($id->model->contentId, $this->getDataId());

        foreach ($reader->getData() as $groupUserRow) {
            $groupId=$groupUserRow->groupId;
        }

        //$id = $id->getId();



        //$groupId = (new UserContentType((new UserSessionType())->userId))->getGroupId();
        return $groupId;

    }

}