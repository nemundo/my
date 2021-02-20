<?php


namespace Nemundo\App\Apache\Install;


use Nemundo\App\Apache\Script\HtaccessScript;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Project\Install\AbstractInstall;

class ApacheInstall extends AbstractInstall
{

    public function install()
    {

        (new ScriptSetup())
            ->addScript(new HtaccessScript());

    }

}