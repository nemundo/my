<?php

namespace Nemundo\Dev\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Project\Path\TmpPath;

class DeleteTmpScript extends AbstractConsoleScript
{

    protected function loadScript()
    {

        $this->scriptName = 'tmp-delete';

    }


    public function run()
    {

        (new TmpPath())
            ->emptyDirectory();

    }


}