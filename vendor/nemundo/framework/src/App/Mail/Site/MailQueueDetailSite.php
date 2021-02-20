<?php

namespace Nemundo\App\Mail\Site;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\App\Mail\Data\MailQueue\MailQueueReader;
use Nemundo\App\Mail\Parameter\MailUrlParameter;
use Nemundo\Html\Container\HtmlContainer;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Web\Site\AbstractSite;

class MailQueueDetailSite extends AbstractSite
{

    /**
     * @var MailQueueDetailSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Log Detail';
        $this->url = 'mail-queue-detail';
        $this->menuActive = false;

        MailQueueDetailSite::$site = $this;
    }


    public function loadContent()
    {

        $mailParameter = new MailUrlParameter();
        $mailRow = (new MailQueueReader())->getRowById($mailParameter->getValue());

        $page = new BootstrapDocument();

        $table = new AdminLabelValueTable($page);
        $table->addLabelValue('Subject', $mailRow->subject);
        $table->addLabelValue('To', $mailRow->mailTo);

        $container = new HtmlContainer($page);
        $container->addContent($mailRow->text);

        $page->render();

    }

}