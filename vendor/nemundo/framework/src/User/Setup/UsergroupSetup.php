<?php

namespace Nemundo\User\Setup;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Data\Usergroup\Usergroup;
use Nemundo\User\Data\Usergroup\UsergroupDelete;
use Nemundo\User\Data\Usergroup\UsergroupUpdate;
use Nemundo\User\Data\UserUsergroup\UserUsergroupDelete;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\User\Usergroup\AbstractUsergroupCollection;

class UsergroupSetup extends AbstractBase
{

    /**
     * @var AbstractApplication
     */
    public $application;

    public function addUsergroup(AbstractUsergroup $usergroup)
    {

        $data = new Usergroup();
        $data->updateOnDuplicate = true;
        $data->id = $usergroup->usergroupId;
        $data->usergroup = $usergroup->usergroup;
        $data->setupStatus = true;
        $data->save();

        return $this;

    }


    public function addUsergroupCollection(AbstractUsergroupCollection $usergroupCollection)
    {

        foreach ($usergroupCollection->getUsergroup() as $usergroup) {
            $this->addUsergroup($usergroup);
        }

        return $this;

    }


    public function removeUsergroup(AbstractUsergroup $usergroup)
    {

        $userUsergroupDelete = new UserUsergroupDelete();
        $userUsergroupDelete->filter->andEqual($userUsergroupDelete->model->usergroupId, $usergroup->usergroupId);
        $userUsergroupDelete->delete();

        (new UsergroupDelete())->deleteById($usergroup->usergroupId);

        return $this;

    }


    public function resetSetupStatus()
    {

        $update = new UsergroupUpdate();
        $update->setupStatus = false;
        $update->update();

    }


    public function removeUnusedUsergroup()
    {

        $delete = new UsergroupDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

        return $this;

    }

}