<?php

namespace Nemundo\App\Mail\Page;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\App\AppConfig;
use Nemundo\App\Mail\Data\MailQueue\MailQueuePaginationReader;
use Nemundo\App\Mail\Parameter\MailUrlParameter;
use Nemundo\App\Mail\Site\MailQueueDeleteSite;
use Nemundo\App\Mail\Site\MailTestSite;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class MailPage extends AbstractTemplateDocument
{

    public function getContent()
    {



        $btn = new AdminSiteButton($this);
        $btn->content = 'Test Mail';
        $btn->site = MailTestSite::$site;


        //$form=new SearchForm($page);

        //$formRow=new BootstrapRow($form);





        $table = new AdminClickableTable($this);

        $header = new AdminTableHeader($table);
        $header->addText('Send Status');
        $header->addText('Send Date/Time');
        $header->addText('To');
        $header->addText('Subject');
        $header->addText('Date/Time');

        $header->addEmpty();

        $mailQueueReader = new MailQueuePaginationReader();  // Mail new MailQueuePaginationModelReader();
        //$mailQueueReader->addOrder($mailQueueReader->model->dateTime, SortOrder::DESCENDING);
        $mailQueueReader->addOrder($mailQueueReader->model->id, SortOrder::DESCENDING);
        //$mailQueueReader->paginationLimit =AppConfig::PAGINATION_LIMIT;

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

           $site = clone(MailQueueDeleteSite::$site);
            $site->addParameter((new MailUrlParameter($mailQueueRow->id)));
            $row->addIconSite($site);

            /*$site = clone($this->detail);
            $site->addParameter((new MailUrlParameter($mailQueueRow->id)));
            $row->addClickableSite($site);*/

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $mailQueueReader;

        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}