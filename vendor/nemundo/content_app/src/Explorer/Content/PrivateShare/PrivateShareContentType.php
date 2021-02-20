<?php

namespace Nemundo\Content\App\Explorer\Content\PrivateShare;

use Nemundo\Content\App\Explorer\Data\PrivateShare\PrivateShare;
use Nemundo\Content\App\Explorer\Data\PrivateShare\PrivateShareReader;
use Nemundo\Content\App\Explorer\Data\PrivateShare\PrivateShareRow;
use Nemundo\Content\App\Explorer\Parameter\PrivateShareParameter;
use Nemundo\Content\App\Explorer\Site\Share\PrivateShareRedirectSite;
use Nemundo\Content\App\Notification\Mail\NotificationMail;
use Nemundo\Content\App\Notification\Type\NotificationTrait;
use Nemundo\Content\App\UserProfile\Content\UserProfile\UserProfileContentType;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Core\Type\Text\Text;
use Nemundo\User\Data\User\UserCount;

class PrivateShareContentType extends AbstractTreeContentType
{

    use NotificationTrait;

    public $email;

    public $message;

    protected function loadContentType()
    {
        $this->typeLabel = 'PrivateShare';
        $this->typeId = '6ed29b05-975a-490c-b081-76d8285a5a8a';
        $this->formClassList[] = PrivateShareContentForm::class;
        $this->viewClassList[] = PrivateShareContentView::class;
    }

    protected function onCreate()
    {

        $this->email = (new Text($this->email))->changeToLowercase()->getValue();


        $count = new UserCount();
        $count->filter->andEqual($count->model->login, $this->email);
        if ($count->getCount() == 0) {


            $userProfile = new UserProfileContentType();
            $userProfile->email = $this->email;
            $userProfile->sendEmail=false;
            $userProfile->saveType();

        }

        $userProfile = (new UserProfileContentType())
            ->fromEmail($this->email);

        $data = new PrivateShare();
        $data->contentId = $this->getParentId();
        $data->groupId = $userProfile->getGroupId();
        $data->userId=$userProfile->getDataRow()->userId;
        $this->dataId=$data->save();

        $mail=new NotificationMail();
        $mail->email = $this->email;
        $mail->subject = $this->getParentContentType()->getSubject();
        $mail->message=$this->message;
        $mail->urlText='More';

        $site=clone(PrivateShareRedirectSite::$site);
        $site->addParameter(new PrivateShareParameter($this->dataId));
        $mail->url=$site->getUrlWithDomain();
        $mail->sendMail();

    }

    protected function onUpdate()
    {
    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {

        $reader= new PrivateShareReader();
        $reader->model->loadUser();
        $this->dataRow=$reader->getRowById($this->dataId);

    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|PrivateShareRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {

        $subject= 'Notification to '.$this->getDataRow()->user->login;
        return $subject;

    }


}