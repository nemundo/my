<?php

namespace Nemundo\App\Application\Script;

use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Com\Package\PackageSetup;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Package\BootstrapPackage;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\JqueryUi\JqueryUiPackage;

class PackageSetupScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'package-setup';
    }

    public function run()
    {


        $packageList = [];

        $applicationReader = new ApplicationReader();
        $applicationReader->filter->andEqual($applicationReader->model->install, true);
        $applicationReader->addOrder($applicationReader->model->install, true);
        foreach ($applicationReader->getData() as $applicationRow) {

            $application = $applicationRow->getApplication();

            foreach ($application->getPackageList() as $package) {
                $packageList[$package->packageName]=$package;
            }

        }



        foreach ($packageList as $package) {

            (new Debug())->write($package->packageName);

            (new PackageSetup())
                ->addPackage($package);

        }


    }
}