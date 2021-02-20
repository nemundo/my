<?php

namespace My\Setup;

use Nemundo\App\Application\Application\ApplicationApplication;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Content\App\Base\Install\ContentAppApplicationInstall;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Content\Install\ContentInstall;
use Nemundo\Dev\Script\AdminBuilderScript;
use Nemundo\Project\Install\ProjectInstall;

class MySetup extends AbstractScript
{
    public function run()
    {
        (new ProjectInstall())->install();

        (new ScriptSetup())
            ->addScript(new AdminBuilderScript())
            ->addScript(new MyPackageSetup());

        (new ContentAppApplicationInstall())->install();

        (new ApplicationApplication())->installApp();
        (new ContentApplication())->installApp();



    }
}