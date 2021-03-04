<?php


namespace Nemundo\App\Linux\_Install;


use Nemundo\App\Linux\_Script\LinuxIntallationScript;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class LinuxInstall extends AbstractInstall
{

    public function install()
    {

        (new ScriptSetup())
            ->addScript(new LinuxIntallationScript());


    }

}