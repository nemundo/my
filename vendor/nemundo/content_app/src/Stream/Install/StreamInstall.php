<?php

namespace Nemundo\Content\App\Stream\Install;

use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\App\Stream\Data\StreamCollection;
use Nemundo\Content\App\Stream\Script\StreamCleanScript;
use Nemundo\Project\Install\AbstractInstall;

class StreamInstall extends AbstractInstall
{
    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new StreamCollection());

        (new ScriptSetup())
            ->addScript(new StreamCleanScript());

    }
}