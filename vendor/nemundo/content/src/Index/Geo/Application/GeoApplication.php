<?php

namespace Nemundo\Content\Index\Geo\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\Index\Geo\Data\GeoModelCollection;
use Nemundo\Content\Index\Geo\Install\GeoIndexInstall;
use Nemundo\Content\Index\Geo\Install\GeoIndexUninstall;
use Nemundo\Content\Index\Geo\Site\GeoIndexSite;

class GeoApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Geo Index';
        $this->applicationId = '1ff9fa5a-2ab3-492c-bb4b-e4a973919a17';
        $this->modelCollectionClass = GeoModelCollection::class;
        $this->installClass = GeoIndexInstall::class;
        $this->uninstallClass = GeoIndexUninstall::class;
        $this->siteClass = GeoIndexSite::class;
    }
}