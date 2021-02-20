<?php

namespace Nemundo\Dev\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Dev\Install\AdminPackageInstall;
use Nemundo\Project\Path\ProjectPath;

class AdminBuilderScript extends AbstractConsoleScript
{

    protected function loadScript()
    {

        $this->scriptName = 'admin-setup';

    }

    public function run()
    {

        /*
        $adminPath = (new ProjectPath())
            ->addPath('admin')
            ->getPath();

        (new AdminPackageInstall($adminPath))->install();*/

        (new AdminPackageInstall())->install();


    }

}