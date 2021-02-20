<?php

namespace Nemundo\User\Builder;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;
use Nemundo\User\Data\User\UserUpdate;
use Nemundo\User\Data\Usergroup\UsergroupCount;
use Nemundo\User\Data\Usergroup\UsergroupReader;
use Nemundo\User\Data\Usergroup\UsergroupRow;
use Nemundo\User\Data\UserUsergroup\UserUsergroup;
use Nemundo\User\Data\UserUsergroup\UserUsergroupDelete;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;
use Nemundo\User\Password\PasswordHash;
use Nemundo\User\Usergroup\AbstractUsergroup;


class UserTypeNew extends AbstractBaseClass
{

    /**
     * @var string
     */
    private $userId;

    public function __construct($userId)
    {

        $this->userId = $userId;

        /*
        $userReader = new UserReader();
        /*$userReader->filter->andEqual($userReader->model->id, $this->userId);
        foreach ($userReader->getData() as $userRow) {
            $this->fromUserRow($userRow);
        }*/

    }


    public function addUsergroup(AbstractUsergroup $usergroup)
    {

        $count = new UsergroupCount();
        $count->filter->andEqual($count->model->id, $usergroup->usergroupId);
        if ($count->getCount() == 1) {

            $data = new UserUsergroup();
            $data->ignoreIfExists = true;
            $data->userId = $this->userId;
            $data->usergroupId = $usergroup->usergroupId;
            $data->save();

        } else {
            (new LogMessage())->writeError('Usergroup does not exist. Usergroup Id: ' . $usergroup->usergroupId);
        }

        return $this;

    }


    public function addAllUsergroup()
    {

        $usergroupReader = new UsergroupReader();
        foreach ($usergroupReader->getData() as $usergroupRow) {

            $usergroup = new \Nemundo\User\Usergroup\Usergroup();
            $usergroup->usergroupId = $usergroupRow->id;

            $this->addUsergroup($usergroup);
        }


    }


    public function removeUsergroup(AbstractUsergroup $usergroup)
    {

        $delete = new UserUsergroupDelete();
        $delete->filter->andEqual($delete->model->userId, $this->userId);
        $delete->filter->andEqual($delete->model->usergroupId, $usergroup->usergroupId);
        $delete->delete();

        return $this;

    }


    public function removeAllUsergroup()
    {

        $delete = new UserUsergroupDelete();
        $delete->filter->andEqual($delete->model->userId, $this->userId);
        $delete->delete();

        return $this;

    }


    /**
     * @return UsergroupRow[]
     */
    public function getUsergroup()
    {

        $reader = new UserUsergroupReader();
        $reader->model->loadUsergroup();
        $reader->model->usergroup->loadApplication();
        $reader->filter->andEqual($reader->model->userId, $this->userId);

        $list = [];
        foreach ($reader->getData() as $row) {
            $list[] = $row->usergroup;
        }

        return $list;

    }


    public function isMemberOfUsergroup(AbstractUsergroup $usergroup)
    {

        $usergroupList = [];

        $reader = new UserUsergroupReader();
        $reader->filter->andEqual($reader->model->userId, $this->userId);
        foreach ($reader->getData() as $row) {
            $usergroupList[] = $row->usergroupId;
        }

        $returnValue = false;
        if (in_array($usergroup->usergroupId, $usergroupList)) {
            $returnValue = true;
        }

        return $returnValue;

    }


    public function changePassword($password)
    {

        $passwordHash = (new PasswordHash($password))->getHashPassword();

        $update = new UserUpdate();
        $update->password = $passwordHash;
        $update->updateById($this->userId);

        return $this;
    }


    public function disableUser()
    {

        $update = new UserUpdate();
        $update->active = false;
        $update->updateById($this->userId);

    }


    public function enableUser()
    {

        $update = new UserUpdate();
        $update->active = true;
        $update->updateById($this->userId);

    }


}