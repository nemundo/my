<?php

namespace Nemundo\App\System\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Application\Type\Install\Install;
use Nemundo\App\Application\Type\Install\Uninstall;
use Nemundo\App\System\Install\SystemInstall;
use Nemundo\App\System\Site\SystemSite;

class SystemApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->application = 'System';
        $this->applicationId = '42d0dc15-2e80-4566-bbf5-ae8a60c26054';
        $this->adminSiteClass = SystemSite::class;
        $this->installClass = Install::class;  // SystemInstall::class;
$this->uninstallClass=Uninstall::class;

    }

}