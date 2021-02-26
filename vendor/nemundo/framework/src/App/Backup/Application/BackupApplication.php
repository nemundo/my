<?php

namespace Nemundo\App\Backup\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Backup\Install\BackupInstall;
use Nemundo\App\Backup\Site\BackupSite;

class BackupApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->application = 'Backup';
        $this->applicationId = '561a06cd-48d9-4cf0-8267-494554992f4e';
        $this->installClass = BackupInstall::class;
        $this->adminSiteClass = BackupSite::class;

    }

}