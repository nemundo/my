<?php


namespace Nemundo\Model\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Script\ImageResizeScript;
use Nemundo\Model\Script\ModelCheckScript;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ModelInstall extends AbstractInstall
{

    public function install()
    {

        (new ScriptSetup())
            ->addScript(new ImageResizeScript());

        //    ->addScript(new ModelCheckScript());

    }

}