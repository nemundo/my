<?php

namespace Nemundo\App\Mail\Script;


use Nemundo\App\Mail\Data\MailQueue\MailQueueDelete;
use Nemundo\App\Mail\Queue\MailQueue;
use Nemundo\App\Script\Type\AbstractScript;

class MailQueueDeleteScript extends AbstractScript
{

    protected function loadScript()
    {
        $this->scriptName = 'mail-queue-delete';
        $this->consoleScript = true;
    }


    public function run()
    {

        (new MailQueue())->deleteMailQueue();

        //$delete = new MailQueueDelete();
        //$delete->delete();

    }

}