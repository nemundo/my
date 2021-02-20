<?php


namespace Nemundo\Content\App\Inbox\Type;


use Nemundo\Content\App\Inbox\Data\Inbox\Inbox;

trait InboxTrait
{

    abstract protected function getUserId();

    protected function saveInbox()
    {

        $data = new Inbox();
        $data->userId = $this->getUserId();
        $data->contentId = $this->getContentId();
        $data->save();


    }


}