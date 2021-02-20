<?php

require __DIR__.'/../../config.php';



(new \Nemundo\App\SystemLog\Application\SystemLogApplication())->installApp();

(new \Nemundo\App\SystemLog\Message\SystemLogMessage(new \Nemundo\App\Scheduler\Application\SchedulerApplication()))->logInformation('hello');
