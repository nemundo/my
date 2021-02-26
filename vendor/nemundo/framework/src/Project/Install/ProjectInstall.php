<?php

namespace Nemundo\Project\Install;


use Nemundo\Admin\Log\Script\LogFileDeleteScript;
use Nemundo\App\Application\Application\ApplicationApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Backup\Application\BackupApplication;
use Nemundo\App\DbAdmin\Install\DbAdminInstall;
use Nemundo\App\Help\Application\HelpApplication;
use Nemundo\App\Mail\Application\MailApplication;
use Nemundo\App\Scheduler\Application\SchedulerApplication;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\System\Application\SystemApplication;
use Nemundo\Dev\Script\AdminBuilderScript;
use Nemundo\Dev\Script\DeleteTmpScript;
use Nemundo\Model\Install\ModelInstall;
use Nemundo\Project\Path\LogPath;
use Nemundo\Project\Path\TmpPath;
use Nemundo\User\Application\UserApplication;
use Nemundo\User\Setup\UsergroupSetup;


class ProjectInstall extends AbstractInstall
{


    public function install()
    {

        /*(new ProjectConfigBuilderScript())->run();
        (new MySqlDatabase())->createDatabase();*/

        // Ausführen vor Setup Status Reset !!!
        /* (new ApplicationInstall())->install();
         (new ScriptInstall())->install();
         (new UserInstall())->install();
         (new SchedulerInstall())->install();*/

        //$this->resetSetupStatus();

        (new ApplicationApplication())->installApp();

        //(new ApplicationInstall())->install();
        //(new ScriptInstall())->install();
        //(new SchedulerInstall())->install();
        //(new UserInstall())->install();

        (new UserApplication())->installApp();
        (new SchedulerApplication())->installApp();
        (new MailApplication())->installApp();
        (new SystemApplication())->installApp();


        (new ApplicationSetup())
            ->addApplication(new BackupApplication())
            ->addApplication(new HelpApplication());


        //(new MailInstall())->install();
        //(new BackupInstall())->install();

        (new DbAdminInstall())->run();

        (new TmpPath())->createPath();
        (new LogPath())->createPath();

        (new ModelInstall())->install();

        (new ScriptSetup())
            //->addScript(new ImageResizeScript())
            ->addScript(new DeleteTmpScript())
            ->addScript(new AdminBuilderScript())
            ->addScript(new LogFileDeleteScript());

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