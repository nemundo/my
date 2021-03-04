<?php


namespace Nemundo\App\DbBackup\Install;


use Nemundo\App\DbBackup\Scheduler\DbBackupScheduler;
use Nemundo\App\DbBackup\Script\DbBackupScript;
use Nemundo\App\DbBackup\Script\DbBackupRestoreScript;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class DbBackupInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ScriptSetup();
        $setup->addScript(new DbBackupScript());
        $setup->addScript(new DbBackupRestoreScript());

        //$setup = new SchedulerSetup();
        //$setup->addScheduler(new DbBackupScheduler());

    }


    public function uninstall()
    {
        // TODO: Implement uninstall() method.
    }

}