<?php

namespace Nemundo\App\Script\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Script\Data\ScriptModelCollection;
use Nemundo\App\Script\Install\ScriptInstall;

class ScriptApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->application = 'Script';
        $this->applicationId = 'c00ca92d-6319-4ea6-a49c-567e320d6971';
        $this->modelCollectionClass = ScriptModelCollection::class;
        $this->installClass = ScriptInstall::class;

    }

}