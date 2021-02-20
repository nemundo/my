<?php


namespace Nemundo\Content\App\Stream\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\Stream\Data\Stream\StreamDelete;

class StreamCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName='stream-clean';
    }

    public function run()
    {

        (new StreamDelete())->delete();

        // TODO: Implement run() method.
    }

}