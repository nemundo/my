<?php


namespace Nemundo\Content\App\Inbox\Type;


use Nemundo\Content\App\Inbox\Data\Inbox\Inbox;
use Nemundo\User\Usergroup\AbstractUsergroup;

trait InboxTrait
{

    //abstract protected function getUserId();


    protected function sendUser($userId) {

        $data = new Inbox();
        $data->userId = $userId;  // $this->getUserId();
        $data->contentId = $this->getContentId();
        $data->save();

        return $this;

    }



    public function sendUsergroup(AbstractUsergroup $usergroup) {

        foreach ($usergroup->getUserList() as $userRow) {
            $this->sendUser($userRow->id);
        }

        return $this;

    }



    /*
    protected function saveInbox()
    {

        $data = new Inbox();
        $data->userId = $this->getUserId();
        $data->contentId = $this->getContentId();
        $data->save();


    }*/


}