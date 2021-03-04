<?php

namespace Nemundo\App\Mail\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Mail\Application\MailApplication;
use Nemundo\App\Mail\Data\MailCollection;
use Nemundo\App\Mail\Scheduler\MailQueueScheduler;
use Nemundo\App\Mail\Script\MailQueueDeleteScript;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class MailInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new MailApplication());

        (new ModelCollectionSetup())
            ->addCollection(new MailCollection());

        (new ScriptSetup(new MailApplication()))
         //   ->addScript(new MailClean())
            ->addScript(new MailQueueDeleteScript());

        (new SchedulerSetup(new MailApplication()))
            ->addScheduler(new MailQueueScheduler());

    }

}