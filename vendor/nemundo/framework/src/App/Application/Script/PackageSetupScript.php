<?php

namespace Nemundo\App\Application\Script;

use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Com\Package\PackageSetup;

class PackageSetupScript extends AbstractConsoleScript
{
    protected function loadScript()
    {

        // app-package
        $this->scriptName = 'package-setup';
    }

    public function run()
    {

        $packageList = [];

        $applicationReader = new ApplicationReader();
        $applicationReader->filter->andEqual($applicationReader->model->install, true);
        foreach ($applicationReader->getData() as $applicationRow) {

            $application = $applicationRow->getApplication();

            foreach ($application->getPackageList() as $package) {
                $packageList[$package->packageName] = $package;
            }

        }


        foreach ($packageList as $package) {

            (new PackageSetup())
                ->addPackage($package);

        }

    }

}