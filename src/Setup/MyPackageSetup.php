<?php

namespace My\Setup;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Com\Package\PackageSetup;
use Nemundo\Package\Bootstrap\Package\BootstrapPackage;

class MyPackageSetup extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'package-setup';
    }

    public function run()
    {

        (new PackageSetup())
            ->addPackage(new BootstrapPackage());


    }
}