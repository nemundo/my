<?php

require 'config.php';

(new \Nemundo\Db\Provider\MySql\Database\MySqlDatabase())->createDatabase();
(new \Nemundo\App\Scheduler\Install\SchedulerInstall())->install();
(new \Nemundo\User\Install\UserInstall())->install();

(new \Nemundo\App\Script\Setup\ScriptSetup())
    ->addScript(new \Nemundo\Dev\Script\AdminBuilderScript());

