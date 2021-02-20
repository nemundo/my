<?php

namespace Nemundo\Dev\Help\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Dev\Help\Script\HelpScript;

class HelpInstall extends AbstractScript
{

    public function run()
    {

   $setup =new ScriptSetup();
   $setup->addScript(new HelpScript());

    }

}