<?php


namespace Nemundo\Content\App\Dashboard\Event;


use Nemundo\Content\App\Dashboard\Data\Dashboard\Dashboard;
use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboard;
use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Type\AbstractType;
use Nemundo\Core\Debug\Debug;
use Nemundo\User\Type\UserSessionType;

class DashboardEvent extends AbstractContentEvent
{

    public function onCreate(AbstractType $contentType)
    {


        (new Debug())->write($contentType->getContentId());


        $data = new Dashboard();  // new UserDashboard();
        //$data->contentId=$this->get getContentId();
        //$data->userId=(new UserSessionType())->userId;
          $data->contentId=$contentType->getContentId();  //c dashboardId=$contentType->this->listbox->getValue();
        $data->save();


    }


    public function onUpdate(AbstractType $contentType)
    {


        /*
        $data = new Dashboard();  // new UserDashboard();
        $data->contentId=$contentType->getContentId();

       // $data->contentId=$this->getContentId();
        //$data->userId=(new UserSessionType())->userId;
      //  $data->contentId=$contentType->getc dashboardId=$contentType->this->listbox->getValue();
        $data->save();*/

    }

}