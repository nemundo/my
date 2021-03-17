<?php

namespace Nemundo\Dev\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Dev\Install\AdminPackageInstall;

class AdminBuilderScript extends AbstractConsoleScript
{

    protected function loadScript()
    {

        $this->scriptName = 'admin-setup';

    }

    public function run()
    {

        (new AdminPackageInstall())->install();

    }

}