<?php

namespace Nemundo\Project\Install;


use Nemundo\App\Application\Application\ApplicationApplication;
use Nemundo\App\Application\Install\ApplicationInstall;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Backup\Application\BackupApplication;
use Nemundo\App\DbAdmin\Install\DbAdminInstall;
use Nemundo\App\FileLog\Application\FileLogApplication;
use Nemundo\App\Help\Application\HelpApplication;
use Nemundo\App\Mail\Application\MailApplication;
use Nemundo\App\MySql\Application\MySqlApplication;
use Nemundo\App\Scheduler\Application\SchedulerApplication;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\System\Application\SystemApplication;
use Nemundo\Dev\Script\AdminBuilderScript;
use Nemundo\Dev\Script\DeleteTmpScript;

use Nemundo\Model\Script\ImageResizeScript;
use Nemundo\Project\Path\LogPath;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Project\Script\ProjectCleanScript;
use Nemundo\User\Application\UserApplication;
use Nemundo\User\Setup\UsergroupSetup;


class ProjectInstall extends AbstractInstall
{


    public function install()
    {

        (new ApplicationInstall())->install();
        (new ApplicationSetup())->addApplication(new ApplicationApplication());
        (new ApplicationApplication())->installApp();

        (new UserApplication())->installApp();
        (new SchedulerApplication())->installApp();
        (new MailApplication())->installApp();

        (new ApplicationSetup())
            ->addApplication(new SystemApplication())
            ->addApplication(new MySqlApplication())
            ->addApplication(new FileLogApplication())
            ->addApplication(new BackupApplication())
            ->addApplication(new HelpApplication());

        (new DbAdminInstall())->run();

        (new TmpPath())->createPath();
        (new LogPath())->createPath();

        (new ScriptSetup())
            ->addScript(new ProjectCleanScript())
            ->addScript(new DeleteTmpScript())
            ->addScript(new AdminBuilderScript());

    }


    public function resetSetupStatus()
    {

        (new ScriptSetup())->resetSetupStatus();
        (new UsergroupSetup())->resetSetupStatus();
        (new ApplicationSetup())->resetSetupStatus();
        (new SchedulerSetup())->resetSetupStatus();

    }


    public function removeUnused()
    {

        (new ScriptSetup())->removeUnusedScript();
        (new UsergroupSetup())->removeUnusedUsergroup();
        (new ApplicationSetup())->removeUnusedApplication();
        (new SchedulerSetup())->removeUnusedScheduler();

    }

}