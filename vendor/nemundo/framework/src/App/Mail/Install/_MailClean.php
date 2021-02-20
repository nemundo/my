<?php

namespace Nemundo\App\Mail\Install;


use Nemundo\App\Mail\Data\MailCollection;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Model\Setup\ModelCollectionSetup;

class MailClean extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'mail-clean';
    }

    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new MailCollection());

        (new MailInstall())->install();

    }

}