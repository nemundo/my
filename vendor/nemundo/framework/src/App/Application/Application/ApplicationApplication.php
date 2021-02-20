<?php

namespace Nemundo\App\Application\Application;

use Nemundo\App\Application\Data\ApplicationModelCollection;
use Nemundo\App\Application\Install\ApplicationInstall;
use Nemundo\App\Application\Site\ApplicationSite;
use Nemundo\App\Application\Type\AbstractApplication;

class ApplicationApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Application';
        $this->applicationId = '84a6e7e2-9c40-4ea4-9390-2ccc9451f2a1';
        $this->modelCollectionClass = ApplicationModelCollection::class;
        $this->installClass = ApplicationInstall::class;
        $this->siteClass = ApplicationSite::class;
    }

}