<?php

namespace Nemundo\App\Mail\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Mail\Application\MailApplication;
use Nemundo\App\Mail\Data\MailCollection;
use Nemundo\App\Mail\Script\MailQueueDeleteScript;
use Nemundo\App\Mail\Scheduler\MailQueueScheduler;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class MailUninstall extends AbstractUninstall
{

    public function uninstall()
    {
     
        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new MailCollection());

        $setup = new ScriptSetup();
        $setup->application = new MailApplication();
        $setup->removeScript(new MailClean());
        $setup->removeScript(new MailQueueDeleteScript());

        (new SchedulerSetup(new MailApplication()))
            ->removeScheduler(new MailQueueScheduler());

    }

}