<?php

namespace Nemundo\App\Mail\Queue;


use Nemundo\App\Mail\Data\MailQueue\MailQueueDelete;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\Base\AbstractBase;

class MailQueue extends AbstractBase
{




    public function deleteMailQueue()
    {

        $delete = new MailQueueDelete();
        $delete->delete();

    }

}