<?php

namespace Nemundo\App\FileLog\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\FileLog\Application\FileLogApplication;
use Nemundo\App\FileLog\Data\FileLogModelCollection;
use Nemundo\App\FileLog\Script\FileLogDeleteScript;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class FileLogInstall extends AbstractInstall
{
    public function install()
    {

        (new ScriptSetup())
            ->addScript(new FileLogDeleteScript());

    }
}