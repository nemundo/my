<?php

namespace Nemundo\App\Mail\Site;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\Mail\Parameter\MailUrlParameter;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Web\Site\AbstractSite;

class MyMailQueueSite extends AbstractSite
{

    /**
     * @var MyMailQueueSite
     */
    public static $site;


    protected function loadSite()
    {
        $this->title[LanguageCode::EN] = 'MyMail';
        $this->title[LanguageCode::DE] = 'Meine eMail';

        $this->url = 'my-mail';
        $this->menuActive = false;
        MyMailQueueSite::$site = $this;
        //$this->restricted=false;

    }




    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $email = (new UserSessionType())->email;


        $p = new Paragraph($page);
        $p->content = 'Mail: ' . $email;


        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Send Status');
        $header->addText('Send Date/Time');
        $header->addText('To');
        $header->addText('Subject');
        $header->addText('Date/Time');

        $header->addEmpty();

        $mailQueueReader = new MailQueuePaginationModelReader();
        $mailQueueReader->filter->andEqual($mailQueueReader->model->mailTo, $email);
        //$mailQueueReader->addOrder($mailQueueReader->model->dateTime, SortOrder::DESCENDING);
        $mailQueueReader->addOrder($mailQueueReader->model->id, SortOrder::DESCENDING);
        $mailQueueReader->paginationLimit = 30;

        foreach ($mailQueueReader->getData() as $mailQueueRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addYesNo($mailQueueRow->send);

            if ($mailQueueRow->send) {
                $row->addText($mailQueueRow->dateTimeSend->getShortDateTimeLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $row->addText($mailQueueRow->mailTo);
            $row->addText($mailQueueRow->subject);
            $row->addText($mailQueueRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            $site = clone(MailQueueDetailSite::$site);
            $site->addParameter((new MailUrlParameter($mailQueueRow->id)));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapPagination($page);
        $pagination->paginationReader = $mailQueueReader;

        $page->render();


    }


}