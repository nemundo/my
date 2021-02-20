<?php

require __DIR__.'/../config.php';

require 'SchedulerJob.php';



(new \Nemundo\App\Scheduler\Install\SchedulerInstall())->run();

$setup = new \Nemundo\App\Scheduler\Setup\SchedulerSetup();
$setup->addScheduler(new TestScheduler());


