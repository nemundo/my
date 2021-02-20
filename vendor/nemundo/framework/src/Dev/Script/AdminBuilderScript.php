<?php

namespace Nemundo\Dev\Script;

use Nemundo\Admin\Install\AdminPackageInstall;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Project\Path\ProjectPath;

class AdminBuilderScript extends AbstractConsoleScript
{

    protected function loadScript()
    {

        $this->scriptName = 'admin-setup';

    }

    public function run()
    {

        $adminPath = (new ProjectPath())
            ->addPath('admin')
            ->getPath();

        (new AdminPackageInstall($adminPath))->install();

    }

}