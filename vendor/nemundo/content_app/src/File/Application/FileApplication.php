<?php

namespace Nemundo\Content\App\File\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\File\Data\FileModelCollection;
use Nemundo\Content\App\File\Install\FileInstall;
use Nemundo\Content\App\File\Install\FileUninstall;
use Nemundo\Content\App\File\Site\FileSite;

class FileApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'File';
        $this->applicationId = '51fcf80e-313e-4ce0-a82c-6e08b03530bb';
        $this->modelCollectionClass = FileModelCollection::class;
        $this->installClass = FileInstall::class;
        $this->uninstallClass = FileUninstall::class;
        $this->siteClass = FileSite::class;
    }
}