<?php

namespace My\Setup;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Com\Package\PackageSetup;
use Nemundo\Package\Bootstrap\Package\BootstrapPackage;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\JqueryUi\JqueryUiPackage;

class MyPackageSetup extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'package-setup';
    }

    public function run()
    {

        (new PackageSetup())
            ->addPackage(new BootstrapPackage())
            ->addPackage(new FontAwesomePackage())
            ->addPackage(new JqueryPackage())
            ->addPackage(new JqueryUiPackage())
            ->addPackage(new FontAwesomePackage());


    }
}