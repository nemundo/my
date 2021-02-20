<?php


namespace Nemundo\Content\Index\Group\User;


use Nemundo\Content\Index\Group\Data\Group\GroupRow;
use Nemundo\Content\Index\Group\Data\GroupUser\GroupUserCount;
use Nemundo\Content\Index\Group\Data\GroupUser\GroupUserReader;
use Nemundo\Content\Index\Group\Type\GroupIndexTrait;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\User\Session\UserSession;
use Nemundo\User\Type\UserSessionType;

class GroupMembership extends AbstractBase
{

    public function getGroupList()
    {

        $userId = (new UserSession())->userId;

        /** @var GroupRow[] $list */
        $list = [];

        $reader = new GroupUserReader();
        $reader->model->loadGroup();
        $reader->model->group->loadGroupType();
        $reader->filter->andEqual($reader->model->userId, $userId);
        $reader->addOrder($reader->model->group->group);
        foreach ($reader->getData() as $groupUserRow) {
            $list[] = $groupUserRow->group;
        }

        return $list;

    }


    /**
     * @param AbstractContentType|GroupIndexTrait $groupType
     * @return GroupRow[]
     */
    public function getGroupIdList(AbstractContentType $groupType=null) {


        $userId = (new UserSession())->userId;

        /** @var GroupRow[] $list */
        $list = [];

        $reader = new GroupUserReader();
        $reader->model->loadGroup();
        $reader->model->group->loadGroupType();
        if ($groupType!==null) {
        $reader->filter->andEqual($reader->model->group->groupTypeId,$groupType->typeId);
        }
        $reader->filter->andEqual($reader->model->userId, $userId);
        $reader->addOrder($reader->model->group->group);
        foreach ($reader->getData() as $groupUserRow) {
            $list[] = $groupUserRow->groupId;
        }

        return $list;



    }


    public function hasGroup(AbstractContentType $groupType=null) {

        $value=false;
        $userId = (new UserSession())->userId;

        $count = new GroupUserCount();
        $count->model->loadGroup();
        $count->model->group->loadGroupType();
        if ($groupType!==null) {
            $count->filter->andEqual($count->model->group->groupTypeId,$groupType->typeId);
        }
        $count->filter->andEqual($count->model->userId, $userId);

        if ($count->getCount()>0) {
            $value=true;
        }

        return $value;

    }



    public function getGroupFilter(AbstractField $groupField) {


        $filter = new Filter();

        foreach ((new GroupMembership())->getGroupIdList() as $groupId) {
            $filter->orEqual($groupField,$groupId);
        }
        $filter->orIsNull($groupField);

        return $filter;

    }


}